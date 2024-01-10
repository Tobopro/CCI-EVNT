<?php

namespace Models;

use DB;
use Evnt;

class Category
{
    protected int $id;
    protected string $name;
    protected string $imageLink;

    public function __construct(int $id, string $name, string $imageLink)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageLink = $imageLink;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImageLink(): string
    {
        return $this->imageLink;
    }

    public static function getEveryCategory(): array
    {

        $categories = DB::fetch("SELECT * FROM categories");
        $categoryObjects = [];
        foreach ($categories as $category) {
            $categoryObjects[] = new Category($category['id'], $category['name'], $category['image_link']);
        }
        return $categoryObjects;
    }

    public function getEvents(): array
    {
        $events = DB::fetch("SELECT * FROM events WHERE category_id = :category_id", ['category_id' => $this->id]);
        $eventObjects = [];
        foreach ($events as $event) {
            $eventObjects[] = new Evnt($event['id'], $event['name'], $event['description'], $event['image_link'], $event['date'], $event['category_id']);
        }
        return $eventObjects;
    }

    public function getUsers(): array
    {
        $idUsersWhoPrefferCategory = DB::fetch("SELECT idUser  FROM isEnjoyed WHERE idCategory = :idCategory", ['idCategory' => $this->id]);
        $userObjects = [];
        //go through all user ids and use the constructById method to create user objects
        foreach ($idUsersWhoPrefferCategory as $idUser) {
            $userObjects[] = User::constructById($idUser['idUser']);
        }
        return $userObjects;
    }
}