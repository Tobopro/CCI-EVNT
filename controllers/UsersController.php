<?php

namespace Controllers;

use Models\User;
use DB;
use Auth;

class UsersController
{

    const URL_CREATE = __DIR__ . '?=creation_profile';
    const URL_INDEX = __DIR__ . '?=profile';
    const URL_HANDLER = '/handlers/user-handler.php';

    public function index()
    {
        $user = User::hydrate(Auth::getCurrentUser());
        require_once base_path('Views/profile_page.php');
    }
    public function create()
    {
        $actionUrl = self::URL_HANDLER;
        require_once base_path('Views/profile_creation_page.php');
    }

    public function store()
    {
        if (empty($_POST['firstName']) or empty($_POST['lastName']) or empty($_POST['mail']) or empty($_POST['password'])) {
            errors('Tous les champs sont obligatoires.');
            redirectAndExit(self::URL_CREATE);
        } elseif ($_POST['password'] !== $_POST['passwordConfirmation']) {
            errors('Les mots de passe sont différents.');
            redirectAndExit(self::URL_CREATE);
        }

        $user = new User(
            $_POST['firstName'] ?? null,
            $_POST['lastName'] ?? null,
            $_POST['mail'] ?? null,
            $_POST['password']
        );

        $user->setCity("Strasbourg");
        $user->save();
    }
    public function edit()
    {
        $actionUrl = self::URL_HANDLER;
        $user = User::hydrate(Auth::getCurrentUser());
        require_once base_path('Views/profile_edit_page.php');
    }
    public function update()
    {
        //
    }
    public function delete()
    {
        //
    }


}