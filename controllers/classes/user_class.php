<!-- file defining the user class  -->


<?php

class User {
    // attributes
    private $id;

    //register form attributes
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $city;
    private $description;
    private $profilePicture;
    private $coverPicture;
    private $prefferedCategories;


    private $isBanned;

    private $participationsCount;
    private $creationsCount;

    private $evntsToCome;
    private $evntsParticipated;
    private $evntsCreated;
    private $evntsLiked;

    private $friends;
    private $friendRequests;
    private $friendRequestsSent;
    private $blockedUsers;
    private $blockedBy;

    // methods 


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
            $query = $db->prepare("INSERT INTO users (email, password, firstName, lastName, city, description, profilePicture, coverPicture, prefferedCategories) VALUES (:email, :password, :firstName, :lastName, :city, :description, :profilePicture, :coverPicture, :prefferedCategories)");
            $query->execute(['email' => $this->email, 'password' => $this->password, 'firstName' => $this->firstName, 'lastName' => $this->lastName, 'city' => $this->city, 'description' => $this->description, 'profilePicture' => $this->profilePicture, 'coverPicture' => $this->coverPicture, 'prefferedCategories' => $this->prefferedCategories]);
            $query = null;

            $this->loadData($db);
            $_SESSION['auth'] = true;
            $_SESSION['user'] = $this;

        } else {
            $_SESSION['email_exists'] = true;
        }
    }


}

?>