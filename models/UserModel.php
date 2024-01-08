<?php

namespace Models;

require_once __DIR__ . "..\controllers\functions.php";

abstract class UserModel
{
    // attributes
    protected ?int $id;
    //register form attributes
    protected ?string $email;
    protected ?string $password;
    protected ?string $firstName;
    protected ?string $lastName;
    protected ?string $city;
    protected ?string $description;
    protected ?int $profilePicture;
    protected ?int $coverPicture;
    protected ?array $preferredCategories;
    protected ?bool $isBanned;
    protected ?int $participationCount;
    protected ?int $creationCount;
    protected ?array $evntsToCome;
    protected ?array $evntsParticipated;
    protected ?array $evntsCreated;
    protected ?array $evntsLiked;
    protected ?array $friends;
    protected ?array $friendRequests;
    // protected $friendRequestsSent;
    protected ?array $blockedUsers;
    protected ?bool $showFutureEvnts;
    protected ?bool $showPastEvnts;
    protected ?bool $showEvntScores;
    protected ?bool $isPublic;

    // methods 

    public function __construct()
    {
        //
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
    public function getisDisplayFutureEvnts(): bool
    {
        return $this->showFutureEvnts;
    }
    public function getisDisplayPastEvnts(): bool
    {
        return $this->showPastEvnts;
    }
    public function getisDisplayEvntScores(): bool
    {
        return $this->showEvntScores;
    }
    public function getisPublic(): bool
    {
        return $this->isPublic;
    }


    public function logIn($db)
    {
        if ($this->isRegisteredInDb($db)) {
            if ($this->checkPassword($db)) {
                if (!$this->isBanned($db)) {

                    $this->loadData($db);
                    $_SESSION['auth'] = true;
                    $_SESSION['user'] = $this;

                } else {
                    $_SESSION['banned'] = true;
                }

            } else {
                $_SESSION['auth'] = false;
            }

        } else {
            $_SESSION['email_exists'] = false;
        }
    }

    public function isRegisteredInDb($db)
    {
        $query = $db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $this->email]);
        $result = $query->fetch();
        $query = null;

        return $result;
    }

    public function checkPassword($db)
    {
        $query = $db->prepare("SELECT password FROM users WHERE email = :email");
        $query->execute(['email' => $this->email]);
        $result = $query->fetch();
        $query = null;

        return $this->password === $result['password'];
    }

    public function isBanned($db)
    {
        $query = $db->prepare("SELECT isBanned FROM users WHERE email = :email");
        $query->execute(['email' => $this->email]);
        $result = $query->fetch();
        $query = null;

        return $result['isBanned'];
    }

    public function loadData($db)
    {
        $query = $db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $this->email]);
        $result = $query->fetch();
        $query = null;

        $this->id = $result['id'];
        $this->firstName = $result['firstName'];
        $this->lastName = $result['lastName'];
        $this->city = $result['city'];
        $this->description = $result['description'];
        $this->profilePicture = $result['profilePicture'];
        $this->coverPicture = $result['coverPicture'];
        $this->isBanned = $result['isBanned'];
        $this->participationsCount = $result['participationsCount'];
        $this->creationsCount = $result['creationsCount'];
        $this->prefferedCategories = $result['prefferedCategories'];
        $this->evntsToCome = $result['evntsToCome'];
        $this->evntsParticipated = $result['evntsParticipated'];
        $this->evntsCreated = $result['evntsCreated'];
        $this->evntsLiked = $result['evntsLiked'];
        $this->friends = $result['friends'];
        $this->friendRequests = $result['friendRequests'];
        $this->friendRequestsSent = $result['friendRequestsSent'];
        $this->blockedUsers = $result['blockedUsers'];
        $this->blockedBy = $result['blockedBy'];
    }

    public function register($db)
    {

        //need to add email and password check

        if (!$this->isRegisteredInDb($db)) {
            $query = $db->prepare("INSERT INTO users (email, password, firstName, lastName, city, description, profilePicture, coverPicture, prefferedCategories) VALUES (:email, :password, :firstName, :lastName, :city, :description, :profilePicture, :coverPicture, :preferredCategories)");
            $query->execute(['email' => $this->email, 'password' => $this->password, 'firstName' => $this->firstName, 'lastName' => $this->lastName, 'city' => $this->city, 'description' => $this->description, 'profilePicture' => $this->profilePicture, 'coverPicture' => $this->coverPicture, 'preferredCategories' => $this->preferredCategories]);
            $query = null;

            $this->loadData($db);
            $_SESSION['auth'] = true;
            $_SESSION['user'] = $this;

        } else {
            $_SESSION['email_exists'] = true;
        }
    }

    public function storeUserData($db)
    {


        $query = $db->prepare(
            "UPDATE users
        SET lastName = :lastName, firstName = :firstName, description = :description, profilePicture = :profilePicture, coverPicture = :coverPicture, city = :city, isPublic = :isPublic, showFutureEvnts = :showFutureEvnts, showPastEvnts = :showPastEvnts, showEvntScores = :showEvntScores
        WHERE idUser = :idUser"
        );

        $query->execute([
            "idUser" => $this->id,
            "lastName" => $this->lastName,
            "firstName" => $this->firstName,
            "description" => $this->description,
            "profilePicture" => $this->profilePicture,
            "coverPicture" => $this->coverPicture,
            "city" => $this->city,
            "isPublic" => $this->isPublic,
            "showFutureEvnts" => $this->showFutureEvnts,
            "showPastEvnts" => $this->showPastEvnts,
            "showEvntScores" => $this->showEvntScores
        ]);
    }


}