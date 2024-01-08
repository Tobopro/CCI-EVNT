<?php

namespace controllers;


class UsersController
{

    public function index()
    {

    }
    public function create()
    {
        $actionURL = "?url=creation_profil";
        require_once base_path('Views/profile_creation_page.php');

    }
}