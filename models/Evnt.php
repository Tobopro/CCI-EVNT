<?php


namespace Models;

require_once('/laragon/www/CCI-EVNT/bootstrap/app.php');



use \DateTime;
use DB;

class Evnt
{
    protected ?int $id;
    protected ?string $title;
    protected ?string $dateEvnt;
    protected ?string $adress;
    protected ?string $description;
    protected ?float $price;
    protected ?string $priceInfo;
    protected ?int $nbParticipants;
    protected ?int $isFreeEntry;
    protected ?int $idUser;
    protected ?int $idCategory;
    protected ?string $urlImage;
    protected ?int $nbLike;
    protected ?int $nbReport;


    public function __construct($title, $dateEvnt, $adress, $description, $price, $priceInfo, $nbParticipants, $isFreeEntry, $idUser, $idCategory, $urlImage, $nbLike, $nbReport)
    {

        $this->title = $title;
        $this->dateEvnt = $dateEvnt;
        $this->adress = $adress;
        $this->description = $description;
        $this->price = $price;
        $this->priceInfo = $priceInfo;
        $this->nbParticipants = $nbParticipants;
        $this->isFreeEntry = $isFreeEntry;
        $this->idUser = $idUser;
        $this->idCategory = $idCategory;
        $this->urlImage = $urlImage;
        $this->nbLike = $nbLike;
        $this->nbReport = $nbReport;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDateEvnt(): string
    {
        return $this->dateEvnt;
    }
    public function getAdress(): string
    {
        return $this->adress;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): ?float
    {
        return $this->price;
    }
    public function getPriceInfo(): ?string
    {
        return $this->priceInfo;
    }
    public function getNbParticipants(): ?int
    {
        return $this->nbParticipants;
    }
    public function getIsFreeEntry(): ?int
    {
        return $this->isFreeEntry;
    }
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }
    public function getIdCategory(): ?int
    {
        return $this->idCategory;
    }

    public function getCategoryName(): ?string
    {

        $idCategory = $this->getIdCategory();
        if (isset($idCategory)) {
            $db = DB::getDB();
            $result = $db->query("SELECT * FROM categories WHERE idCategory = $idCategory");
            $categoryName = $result->fetch();
            $categoryName = $categoryName['name'];

            echo $categoryName;
            return $categoryName;
        } else {
            return null;
        }


    }


    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }
    public function getNbLike(): ?int
    {
        return $this->nbLike;
    }
    public function getNbReport(): ?int
    {
        return $this->nbReport;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setDateEvnt(string $dateEvnt): void
    {
        $this->dateEvnt = $dateEvnt;
    }
    public function setAdress(string $adress): void
    {
        $this->adress = $adress;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }
    public function setPriceInfo(?string $priceInfo): void
    {
        $this->priceInfo = $priceInfo;
    }
    public function setNbParticipants(?int $nbParticipants): void
    {
        $this->nbParticipants = $nbParticipants;
    }
    public function setIsFreeEntry(?int $isFreeEntry): void
    {
        $this->isFreeEntry = $isFreeEntry;
    }

    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function setIdCategory(int $idCategory): void
    {
        $this->idCategory = $idCategory;
    }



    public function setUrlImage(string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }

    public function setNbLike(int $nbLike): void
    {
        $this->nbLike = $nbLike;
    }

    public function setNbReport(int $nbReport): void
    {
        $this->nbReport = $nbReport;
    }

    public function createEvent($db)
    {
        $formattedDate = $this->dateEvnt;
        $result = $db->exec("INSERT INTO events (title, dateEvnt, adress, description,  price, priceInfo, nbParticipants, isFreeEntry, idUser, idCategory, urlImage, nbLike, nbReport) VALUES ('$this->title', '$formattedDate', '$this->adress', '$this->description',  '$this->price',' ', '$this->nbParticipants', '$this->isFreeEntry', '$this->idUser', '$this->idCategory', '$this->urlImage', '$this->nbLike', '$this->nbReport')");

        if ($result !== false) {
            $message = "Votre évènement a bien été créé";
            $type_message = "success";
            header('Location: creation_event.php?message=' . $message . '&type_message=' . $type_message);
        } else {
            echo "Error: " . $db->errorInfo()[2];
        }
    }

    public function deleteEvent($db, $eventId)
    {
        $result = $db->exec("DELETE FROM events WHERE idEvent = $eventId");

        return $result !== false;
    }


    public static function getAllEvents($db)
    {
        $result = $db->query("SELECT * FROM events ORDER BY idEvent DESC");
        $events = $result->fetchAll();
        return $events;
    }

     public static function getLastSixEvents($db)
    {
        $result = $db->query("SELECT * FROM events ORDER BY idEvent DESC LIMIT 6");
        $events = $result->fetchAll();
        return $events;
    }

  public static function getAllEventsOfUser($db, $idUser)
{
    $stmt = $db->prepare("SELECT * FROM events WHERE idUser = :idUser");
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();

    $events = $stmt->fetchAll();
    return $events;
}

  public static function getAllEventsLikedOfUser($db, $idUser)
{
    $stmt = $db->prepare("SELECT * FROM `isliked`
    INNER JOIN events ON events.idEvent=isliked.idEvent
    WHERE isliked.idUser=:idUser");
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();

    $events = $stmt->fetchAll();
    return $events;
}


    public static function getEventById($db, $id)
    {
        $result = $db->query("SELECT * FROM events WHERE idEvent = $id");
        $event = $result->fetch();
        return $event;
    }

    public static function getCategories($db)
    {
        $result = $db->query("SELECT * FROM categories");
        $categories = $result->fetchAll();
        return $categories;
    }

    public static function hydrate(array $data)
    {
        $evnt = new Evnt(
            $data['title'] ?? '',
            $data['dateEvnt'] ?? '',
            $data['adress'] ?? '',
            $data['description'] ?? '',
            $data['price'] ?? null,
            $data['priceInfo'] ?? '',
            $data['nbParticipants'] ?? '',
            $data['isFreeEntry'] ?? '',
            $data['idUser'] ?? null,
            $data['idCategory'] ?? null,
            $data['urlImage'] ?? '',
            $data['nbLike'] ?? 0,
            $data['nbReport'] ?? 0
        );
        $evnt->setId($data['idEvent']);

        return $evnt;
    }

      public function isParticipatingTo($idEvent,$idUser){
        $arrayOfParticipants= DB::fetch("SELECT * FROM isaccepted WHERE idEvent = :idEvent",
        ['idEvent' => $idEvent],
        );
        
        foreach ($arrayOfParticipants as $participant) {

         
            if($participant['idUser'] == $idUser){
                $isParticipating = true;
                if ($isParticipating==true){
                    return true;
                }

            }
        }

    }


}