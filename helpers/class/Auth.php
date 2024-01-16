<?php

use Models\User;

class Auth
{
    const SESSION_KEY = 'sessionKey';

    private static ?array $user = null;

    public static function getCurrentUser(): ?array
    {
        $id = self::getSessionUserId();

        if (self::$user === null and $id) {
            self::$user = DB::fetch(
                "SELECT * FROM users WHERE idUser = :idUser LIMIT 1",
                ['idUser' => $id]
            );

            if (self::$user === false) {
                self::$user = null;
            } else if (self::$user) {
                self::$user = self::$user[0] ?? null;

                // Not found in records
                if (empty(self::$user)) {
                    self::removeSessionUserId();
                }
            }
        }

        return self::$user;
    }

    public static function isAuthOrRedirect(): void
    {
        // Check user is auth
        if (!Auth::getCurrentUser()) {
            // Not Auth Or account not exists
            errors('Vous devez être connecté pour accèder à cette page.');
            redirectAndExit(__DIR__ . "?url/login");
        }
    }

    public static function isAdminOrRedirect(): void
    {
        // Check user is auth
        if (!Auth::getCurrentUser() || !isset($_SESSION['admin'] )|| $_SESSION['admin']==!true) {
            // Not Auth Or account not exists
            errors('Vous devez être admin pour accèder à cette page.');
            redirectAndExit('/index.php?url=login');
<<<<<<< HEAD
        } else {
            errors('Vous devez être admin pour accèder à cette page.');
            redirectAndExit('/index.php?url=login');
=======
>>>>>>> dea8b0bc24c16dbcb1dd0b01265738b0f2eff5e3
        }
    }

    public static function isGuestOrRedirect(): void
    {
        // Check user is guest (invité)
        if (Auth::getCurrentUser()) {
            redirectAndExit('/home.php');
        }
    }

    public static function getSessionUserIdKey(): string
    {
        return self::SESSION_KEY;
    }

    public static function getSessionUserId(): ?int
    {
        return $_SESSION[self::getSessionUserIdKey()] ?? null;
    }

    public static function removeSessionUserId(): void
    {
        unset($_SESSION[self::getSessionUserIdKey()]);
    }
}