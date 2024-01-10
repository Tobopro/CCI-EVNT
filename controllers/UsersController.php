<?php

namespace Controllers;

use Models\User;
use DB;
use Auth;

class UsersController
{

    const URL_CREATE = '/?url=creation_profile';
    const URL_INDEX = '/?url=profile';
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
        $id = $_POST['id'] ?? null;
        $user = $this->getUserById(intval($id));

        if (isset($_POST['lastName'])) {
            $user->setLastName($_POST['lastName'] ?: '');
        }
        if (isset($_POST['label'])) {
            $user->setFirstName($_POST['firstName'] ?: '');
        }
        if (isset($_POST['description'])) {
            $user->setDescription($_POST['description'] ?: '');
        }
        if (isset($_POST['picture'])) {
            $user->setProfilePicture($_POST['picture'] ?: '');
        }
        if (isset($_POST['city'])) {
            $user->setCity($_POST['city'] ?: 0);
        }
        if (isset($_POST['showFutureEvnts'])) {
            $user->setShowFutureEvnts($_POST['showFutureEvnts'] = 'on' ? 1 : 0);
        }
        if (isset($_POST['showPastEvnts'])) {
            $user->setShowPastEvnts($_POST['showPastEvnts'] = 'on' ? 1 : 0);
        }
        if (isset($_POST['showEvntScores'])) {
            $user->setShowEvntScores($_POST['showEvntScores'] = 'on' ? 1 : 0);
        }
        if (isset($_POST['coverPicture'])) {
            $user->setShowEvntScores($_POST['coverPicture'] ?: null);
        }
        if (isset($_POST['isPublic'])) {
            $user->setIsPublic($_POST['isPublic'] = 'on' ? 1 : 0);
        }



        // Update the user in DB
        $result = $user->save();
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
        } else {
            success('Le produit a bien été modifié.');
        }
        redirectAndExit(self::URL_INDEX);

    }
    public function delete()
    {
        //
    }

    protected function getUserById(?int $id): User
    {
        if (!$id) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        $user = DB::fetch(
            "SELECT * FROM users WHERE idUser = :idUser",
            ['idUser' => $id]
        );
        if ($user === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($user)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        return User::hydrate($user[0]);
    }

}