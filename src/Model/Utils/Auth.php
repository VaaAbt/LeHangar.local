<?php

namespace App\Model\Utils;

use App\Model\Grower;
use App\Model\Manager;

class Auth
{

    /**
     * @var User|null
     */
    private static $_account;

    /**
     * Verify if the user is logged in
     *
     * @return bool
     */
    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['auth']);
    }


    /**
     * Attempt to log in the user
     *
     * @param string $email - Email of the user
     * @param string $password - Password of the user
     * @return User|null - The user if credentials works or null if not
     */
    public static function attempt(string $email, string $password, string $type): array
    {
        self::$_account = null;

        // Search the grower or the manager in the database using its email
        $user = null;
        if($type === "grower"){
            $user = Grower::query()
                ->where('email', $email)
                ->first();
        } else if($type === "manager"){
            $user = Manager::query()
                ->where('email', $email)
                ->first();
        }


        // If a grower or manager exists with this email, verify the password
        if ($user && password_verify($password, $user->getAttribute('password'))) {
            // Valid credentials, log in the user
            $_SESSION['auth'] = $user->getAttribute('id');
            $_SESSION['type'] = $type;
            self::$_account = $user;
        }

        return [self::$_account, $user->getAttribute('id')];
    }

    /**
     * Log out the current user
     */
    public static function logout(): void
    {
        unset($_SESSION['auth']);
        unset($_SESSION['type']);
        self::$_account = null;
    }

}