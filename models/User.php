<?php

namespace Models;

use DB;

class User
{
    const TABLE_NAME = "users";
    protected ?int $id;
    protected ?string $lastName;
    protected ?string $firstName;
    protected ?string $description;
    protected ?string $picture;
    protected ?string $mail;
    protected ?string $city;
    protected ?string $password;
    protected ?int $creationCount;
    protected ?int $participationCount;
    protected ?bool $isBanned;
    protected ?array $lastActivity;
    protected ?int $reportedCount;
    protected ?int $showFutureEvnts;
    protected ?int $showPastEvnts;
    protected ?int $showEvntScores;
    protected ?string $coverPicture;
    protected ?int $isPublic;
    protected ?array $preferredCategories;
    protected ?array $evntsToCome;
    protected ?array $evntsParticipated;
    protected ?array $evntsCreated;
    protected ?array $evntsLiked;
    protected ?array $friends;
    protected ?array $friendRequests;
    // protected $friendRequestsSent;
    protected ?array $blockedUsers;
    protected array $changedFields = [];

    // methods 

    public function toArray()
    {
        return [
            'lastName' => $this->lastName,
            'firstName' => $this->firstName,
            'description' => $this->description,
            'picture' => $this->picture,
            'mail' => $this->mail,
            'city' => $this->city,
            'password' => $this->password,
            'showFutureEvnts' => $this->showFutureEvnts,
            'showPastEvnts' => $this->showPastEvnts,
            'showEvntScores' => $this->showEvntScores,
            'coverPicture' => $this->coverPicture,
            'isPublic' => $this->isPublic
        ];
    }



    public function __construct(?string $firstName, ?string $lastName, ?string $mail, ?string $password)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setMail($mail);
        $this->setPassword($password);
    }

    public static function hydrate(array $data): User
    {
        $user = new User(
            $data['firstName'],
            $data['lastName'],
            $data['mail'],
            $data['password']
        );
        $user->id = $data['idUser'] ?? null;
        $user->description = $data['description'] ?? null;
        $user->picture = $data['picture'] ?? null;
        $user->city = $data['city'] ?? null;
        $user->creationCount = $data['creationCount'] ?? null;
        $user->participationCount = $data['participationCount'] ?? null;
        $user->isBanned = $data['isBanned'] ?? null;
        $user->coverPicture = $data['coverPicture'] ?? null;
        $user->preferredCategories = $data['preferredCategories'] ?? null;
        $user->evntsToCome = $data['evntsToCome'] ?? null;
        $user->evntsParticipated = $data['evntsParticipated'] ?? null;
        $user->evntsCreated = $data['evntsCreated'] ?? null;
        $user->evntsLiked = $data['evntsLiked'] ?? null;
        $user->friends = $data['friends'] ?? null;
        $user->friendRequests = $data['friendRequests'] ?? null;
        $user->blockedUsers = $data['blockedUsers'] ?? null;
        $user->showFutureEvnts = $data['showFutureEvnts'] ?? null;
        $user->showPastEvnts = $data['showPastEvnts'] ?? null;
        $user->showEvntScores = $data['showEvntScores'] ?? null;
        $user->isPublic = $data['isPublic'] ?? null;

        return $user;
    }

    public static function getAllUsers($db)
    {
        $result = $db->query("SELECT * FROM users");
        $users = $result->fetchAll();
        return $users;
    }

    public function getEmail(): ?string
    {
        return $this->mail;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getProfilePicture(): ?string
    {
        return $this->picture;
    }

    public function getCoverPicture(): ?string
    {
        return $this->coverPicture;
    }

    public function getPreferredCategories(): ?array
    {
        return $this->preferredCategories;
    }

    public function getIsBanned(): bool
    {
        return $this->isBanned;
    }

    public function getParticipationsCount(): ?int
    {
        return $this->participationCount;
    }

    public function getCreationsCount(): ?int
    {
        return $this->creationCount;
    }

    public function getEvntsToCome(): ?array
    {
        return $this->evntsToCome;
    }

    public function getEvntsParticipated(): ?array
    {
        return $this->evntsParticipated;
    }

    public function getEvntsCreated(): ?array
    {
        return $this->evntsCreated;
    }

    public function getEvntsLiked(): ?array
    {
        return $this->evntsLiked;
    }

    public function getFriends(): ?array
    {
        return $this->friends;
    }

    public function getFriendRequests(): ?array
    {
        return $this->friendRequests;
    }

    public function getBlockedUsers(): ?array
    {
        return $this->blockedUsers;
    }

    public function getisDisplayFutureEvnts(): ?bool
    {
        return $this->showFutureEvnts;
    }
    public function getisDisplayPastEvnts(): ?bool
    {
        return $this->showPastEvnts;
    }
    public function getisDisplayEvntScores(): ?bool
    {
        return $this->showEvntScores;
    }
    public function getisPublic(): bool
    {
        return $this->isPublic;
    }
    public function getUserId(): ?int
    {
        return $this->id;
    }

    public function setLastName(string $lastName): void
    {
        $this->setFields('lastName', $lastName);
    }

    public function setFirstName(string $firstName): void
    {
        $this->setFields('firstName', $firstName);
    }

    public function setDescription(string $description): void
    {
        $this->setFields('description', $description);
    }

    public function setMail(string $mail): void
    {
        $this->setFields('mail', $mail);
    }

    public function setPassword(string $password): void
    {
        $this->setFields('password', $password);
    }
    
    public function setCity(string $city): void
    {
        $this->setFields('city', $city);
    }

    public function setProfilePicture(?string $profilePicture): void
    {
        $this->setFields('picture', $profilePicture);
    }

    public function setShowFutureEvnts(?int $showFutureEvnts): void
    {
        $this->setFields('showFutureEvnts', $showFutureEvnts);
    }

    public function setShowPastEvnts(?int $showPastEvnts): void
    {
        $this->setFields('showPastEvnts', $showPastEvnts);
    }

    public function setShowEvntScores(?int $showEvntScores): void
    {
        $this->setFields('showEvntScores', $showEvntScores);
    }

    public function setCoverPicture(?string $coverPicture): void
    {
        $this->setFields('coverPicture', $coverPicture);
    }

    public function setIsPublic(?int $isPublic): void
    {
        $this->setFields('isPublic', $isPublic);
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }





    public function save($forced = false): int|false
    {
        if ($this->id ?? null) {
            // Update
            if ($forced) {
                return DB::update(self::TABLE_NAME, $this->toArray(), $this->id, 'idUser');
            } elseif ($this->changedFields) {
                $toArray = $this->toArray();
                $updates = [];
                foreach ($this->changedFields as $key) {
                    if (array_key_exists($key, $toArray)) {
                        $updates[$key] = $toArray[$key];
                    }
                }
        
                return DB::update(self::TABLE_NAME, $updates, $this->id, 'idUser');
            }
        } else {
            // Insert
            return DB::insert(self::TABLE_NAME, $this->toArray());
        }

        return 0;
    }
    public function delete(): int|false
    {
        return self::staticDelete($this->id);
    }

    public static function staticDelete(int $id): int|false
    {
        return DB::statement(
            "DELETE FROM users WHERE idUser = :idUser",
            ['idUser' => $id],
        );
    }

    protected function setFields($name, $value)
    {
        if (property_exists($this, $name) and isset($this->$name) and $this->$name != $value) {
            $this->changedFields[] = $name;
        }
        $this->$name = $value;

    }

}



// public function register($db)
// {

//     //need to add mail and password check

//     if (!$this->isRegisteredInDb($db)) {
//         $query = $db->prepare("INSERT INTO users (mail, password, firstName, lastName, city, description, profilePicture, coverPicture, prefferedCategories) VALUES (:mail, :password, :firstName, :lastName, :city, :description, :profilePicture, :coverPicture, :preferredCategories)");
//         $query->execute(['mail' => $this->mail, 'password' => $this->password, 'firstName' => $this->firstName, 'lastName' => $this->lastName, 'city' => $this->city, 'description' => $this->description, 'profilePicture' => $this->profilePicture, 'coverPicture' => $this->coverPicture, 'preferredCategories' => $this->preferredCategories]);
//         $query = null;

//         $this->loadData($db);
//         $_SESSION['auth'] = true;
//         $_SESSION['user'] = $this;

//     } else {
//         $_SESSION['mail_exists'] = true;
//     }
// }


// Future update query

// "UPDATE users
// SET lastName = :lastName, firstName = :firstName, description = :description, profilePicture = :profilePicture, coverPicture = :coverPicture, city = :city, isPublic = :isPublic, showFutureEvnts = :showFutureEvnts, showPastEvnts = :showPastEvnts, showEvntScores = :showEvntScores
// WHERE idUser = :idUser"


// $query->execute([
//     "idUser" => $this->id,
//     "lastName" => $this->lastName,
//     "firstName" => $this->firstName,
//     "description" => $this->description,
//     "profilePicture" => $this->profilePicture,
//     "coverPicture" => $this->coverPicture,
//     "city" => $this->city,
//     "isPublic" => $this->isPublic,
//     "showFutureEvnts" => $this->showFutureEvnts,
//     "showPastEvnts" => $this->showPastEvnts,
//     "showEvntScores" => $this->showEvntScores
// ]);


// Encore utile ????
// public function loadData($db)
// {
//     $query = $db->prepare("SELECT * FROM users WHERE mail = :mail");
//     $query->execute(['mail' => $this->mail]);
//     $result = $query->fetch();
//     $query = null;

//     $this->id = $result['id'];
//     $this->firstName = $result['firstName'];
//     $this->lastName = $result['lastName'];
//     $this->city = $result['city'];
//     $this->description = $result['description'];
//     $this->profilePicture = $result['profilePicture'];
//     $this->coverPicture = $result['coverPicture'];
//     $this->isBanned = $result['isBanned'];
//     $this->participationsCount = $result['participationsCount'];
//     $this->creationsCount = $result['creationsCount'];
//     $this->prefferedCategories = $result['prefferedCategories'];
//     $this->evntsToCome = $result['evntsToCome'];
//     $this->evntsParticipated = $result['evntsParticipated'];
//     $this->evntsCreated = $result['evntsCreated'];
//     $this->evntsLiked = $result['evntsLiked'];
//     $this->friends = $result['friends'];
//     $this->friendRequests = $result['friendRequests'];
//     $this->friendRequestsSent = $result['friendRequestsSent'];
//     $this->blockedUsers = $result['blockedUsers'];
//     $this->blockedBy = $result['blockedBy'];
// }

// public function logIn($db)
// {
//     if ($this->isRegisteredInDb($db)) {
//         if ($this->checkPassword($db)) {
//             if (!$this->isBanned($db)) {

//                 $this->loadData($db);
//                 $_SESSION['auth'] = true;
//                 $_SESSION['user'] = $this;

//             } else {
//                 $_SESSION['banned'] = true;
//             }

//         } else {
//             $_SESSION['auth'] = false;
//         }

//     } else {
//         $_SESSION['mail_exists'] = false;
//     }
// }   
// public function checkPassword($db)
    // {
    //     $query = $db->prepare("SELECT password FROM users WHERE mail = :mail");
    //     $query->execute(['mail' => $this->mail]);
    //     $result = $query->fetch();
    //     $query = null;

    //     return $this->password === $result['password'];
    // }

    // public function isBanned($db)
    // {
    //     $query = $db->prepare("SELECT isBanned FROM users WHERE mail = :mail");
    //     $query->execute(['mail' => $this->mail]);
    //     $result = $query->fetch();
    //     $query = null;

    //     return $result['isBanned'];
    // }

    
    // public function isRegisteredInDb($db)
    // {
    //     $query = $db->prepare("SELECT * FROM users WHERE mail = :mail");
    //     $query->execute(['mail' => $this->mail]);
    //     $result = $query->fetch();
    //     $query = null;

    //     return $result;
    // }
