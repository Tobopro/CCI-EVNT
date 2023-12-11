<!-- file defining the user class  -->


<?php

class User {
    // attributes
    private $id;

    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $city;
    private $description;
    private $profilePicture;
    private $coverPicture;

    private $isBanned;

    private $participationsCount;
    private $creationsCount;
    private $prefferedCategories;

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
}

?>