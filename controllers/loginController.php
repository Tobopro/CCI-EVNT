<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';
use Auth;
use Models\User;
use DB;


class LoginController
{

    public static function logIn()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $db = DB::getDB();
            $allUsers = User::getAllUsers($db);

            foreach ($allUsers as $user) {
                if ($user['mail'] == $email && $user['password'] == $password) {
                    $_SESSION['firstName'] = $user['firstName'];
                    $_SESSION['lastName'] = $user['lastName'];
                    $_SESSION['email'] = $user['mail'];
                    $_SESSION['auth'] = true;
                    $_SESSION[Auth::SESSION_KEY] = $user['idUser'];

                    $message = "Bonjour " . $_SESSION['firstName'];
                    $type_message = "success";
                    header('Location: ../index.php?url=dashboard&' . 'message=' . $message . '&type_message=' . $type_message);
                    exit;
                } else {
                    $message = "Votre e-mail ou mot de passe est invalide.";
                    $type_message = "danger";
                    header('Location: ../index.php?url=login&' . 'message=' . $message . '&type_message=' . $type_message);
                }
            }
        } else {
            $message = "Une erreur est survenue.";
            $type_message = "danger";
            header('Location: ../index.php?url=login&' . 'message=' . $message . '&type_message=' . $type_message);
        }
    }

    public static function show()
    {

        include('../views/auth/login.php');
        exit;
    }

}