<?php

namespace models;

require_once __DIR__ . "..\controllers\functions.php";
require_once __DIR__ . "..\controllers\UsersController.php";
use controllers\UsersController;



class Users
{
    // attributes
    protected $id;
    //register form attributes
    protected $email;
    protected $password;
    protected $firstName;
    protected $lastName;
    protected $city;
    protected $description;
    protected $profilePicture;
    protected $coverPicture;
    protected $prefferedCategories;
    protected $isBanned;
    protected $participationsCount;
    protected $creationsCount;
    protected $evntsToCome;
    protected $evntsParticipated;
    protected $evntsCreated;
    protected $evntsLiked;
    protected $friends;
    protected $friendRequests;
    protected $friendRequestsSent;
    protected $blockedUsers;
    protected $blockedBy;

    // methods 

    public function __construct()
    {
        $user = new UsersController();
        $user->loadData(connectionDB());

    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getProfilePicture(): string
    {
        return $this->profilePicture;
    }

    public function getCoverPicture(): string
    {
        return $this->coverPicture;
    }

    public function getPreferredCategories(): array
    {
        return $this->preferredCategories;
    }

    public function getIsBanned(): bool
    {
        return $this->isBanned;
    }

    public function getParticipationsCount(): int
    {
        return $this->participationsCount;
    }

    public function getCreationsCount(): int
    {
        return $this->creationsCount;
    }

    public function getEvntsToCome(): array
    {
        return $this->evntsToCome;
    }

    public function getEvntsParticipated(): array
    {
        return $this->evntsParticipated;
    }

    public function getEvntsCreated(): array
    {
        return $this->evntsCreated;
    }

    public function getEvntsLiked(): array
    {
        return $this->evntsLiked;
    }

    public function getFriends(): array
    {
        return $this->friends;
    }

    public function getFriendRequests(): array
    {
        return $this->friendRequests;
    }

    public function getFriendRequestsSent(): array
    {
        return $this->friendRequestsSent;
    }

    public function getBlockedUsers(): array
    {
        return $this->blockedUsers;
    }

    public function getBlockedBy(): array
    {
        return $this->blockedBy;
    }


}