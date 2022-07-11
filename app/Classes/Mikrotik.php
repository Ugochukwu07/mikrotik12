<?php

namespace App\Classes;

use RouterOS\Client;
use RouterOS\Exceptions\ClientException;
use RouterOS\Exceptions\ConfigException;
use RouterOS\Exceptions\QueryException;

class Mikrotik
{
    public function checkConnection(): Client
    {
        try {
            $client = new Client([
                "host" => getSetting("mikrotik_ip"),
                "user" => getSetting("mikrotik_login_username"),
                "pass" => getSetting("mikrotik_login_password") ?: "",
            ]);
        } catch (ClientException $exception) {
            abort(403, __("Unable to establish socket session, Operation timed out"));
        } catch (ConfigException $exception) {
            abort(403, __("Unable to establish socket session, Operation timed out"));
        } catch (QueryException $exception) {
            abort(403, __("Unable to establish socket session, Operation timed out"));
        }

        return $client;
    }
}
