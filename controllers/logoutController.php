<?php

namespace Controllers;

Class LogoutController {

 public static function logOut(): void
    {
        session_destroy();
        header('Location: ?url=login');
    }
}

