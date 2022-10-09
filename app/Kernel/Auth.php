<?php

namespace App\Kernel;

use App\Models\User;

class Auth
{
    public static function flashSession($user, $userType = 'user')
    {
        $_SESSION['auth'][$userType] = $user;

        return true;
    }

    public static function check(string $authType = 'user'): bool
    {
        if (!isset($_SESSION['auth'][$authType])) {
            return false;
        }

        return true;
    }
}