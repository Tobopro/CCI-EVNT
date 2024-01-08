<?php

namespace Controllers;


class UsersController
{

    const URL_CREATE = __DIR__ . '?=creation_profile';
    const URL_INDEX = __DIR__ . '?=profile';
    const URL_HANDLER = '/handlers/user-handler.php';

    public function index()
    {

    }
    public function create()
    {
        $actionURL = self::URL_HANDLER;
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
    }
    public function edit()
    {
        //
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