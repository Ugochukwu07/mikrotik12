<?php

namespace App\Console\Commands;

use App\Classes\Mikrotik;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use RouterOS\Query;

class TerminateUser extends Command
{
    protected Mikrotik $checkMikrotikConnection;
    protected $signature = 'terminate:user';
    protected $description = 'Terminate expired users';

    public function __construct()
    {
        parent::__construct();
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function handle()
    {
        if (!$this->checkMikrotikConnection->checkConnection()) {
            return $this->checkMikrotikConnection->checkConnection();
        }

        $subscriptions = Subscription::where('user_status', 1)->get();

        foreach ($subscriptions as $subscription) {

            $id = $subscription->user_id;
            $user = User::find($id);

            if ($user->mikrotik_connection_type == null) {
                break;
            }

            $sub_expires = $subscription->where('payment_status', 1)
                ->whereDate('subscription_expires', date('Y-m-d'))
                ->count();

            $pay_expires = $subscription->where('payment_status', 0)
                ->whereDate('payment_last_day', '<', date('Y-m-d'))
                ->count();

            if (($pay_expires !== 0) || ($sub_expires !== 0)) {
                if ($user->mikrotik_connection_type == "PPP") {
                    $query = new Query('/ppp/secret/print');
                    $query->where('name', $user->mikrotik_user);
                    $secret = $this->checkMikrotikConnection->checkConnection()->query($query)->read();

                    $set = new Query('/ppp/secret/set');
                    $set->equal('.id', $secret[0]['.id']);
                    $set->equal('disabled', 'yes');
                    $this->checkMikrotikConnection->checkConnection()->query($set)->read();
                }

                if ($user->mikrotik_connection_type == "HotSpot") {
                    $query = new Query('/ip/hotspot/user/print');
                    $query->where('name', $user->mikrotik_user);
                    $secret = $this->checkMikrotikConnection->checkConnection()->query($query)->read();

                    $set = new Query('/ip/hotspot/user/set');
                    $set->equal('.id', $secret[0]['.id']);
                    $set->equal('disabled', 'yes');
                    $this->checkMikrotikConnection->checkConnection()->query($set)->read();
                }

                $user->update([
                    'password' => bcrypt(Str::random(8)),
                    'status'   => 3
                ]);

                $subscription->update([
                    'subscription_expires' => Carbon::now(),
                    'user_status'          => 3
                ]);
            }
        }
        return 0;
    }
}
