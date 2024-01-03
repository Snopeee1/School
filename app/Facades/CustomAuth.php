<?php
namespace App\Facades;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomAuth extends Auth
{
    public static function userDoesExist($user)
    {
        // Add your custom logic to determine if the user is a premium user
        $userExist = DB::table('users')
                          ->where('LRN', $user['LRN'])
                          ->first();

        if ($user['LRN'] == $userExist->LRN) {
            return true;
        }

        return false;
    }
}
