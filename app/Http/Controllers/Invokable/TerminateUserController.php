<?php

namespace App\Http\Controllers\Invokable;

use App\Classes\Mikrotik;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RouterOS\Query;

class TerminateUserController extends Controller
{
    protected Mikrotik $checkMikrotikConnection;

    public function __construct()
    {
        $this->middleware('auth');
        $this->checkMikrotikConnection = new Mikrotik();
    }

    public function __invoke(Request $request, User $user)
    {
        if ($user->mikrotik_connection_type && getSetting("using_mikrotik")) {
            if (!$this->checkMikrotikConnection->checkConnection()) {
                return $this->checkMikrotikConnection->checkConnection();
            }

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
        }

        $user->update([
            'password' => bcrypt(Str::random(8)),
            'status' => 3
        ]);

        $user_subscription = Subscription::where('user_id', $user->id)->latest();

        $user_subscription->update([
            'subscription_expires' => Carbon::now(),
            'user_status' => 3
        ]);

        return redirect('users')->with('success', __('User removed successfully'));
    }
}
