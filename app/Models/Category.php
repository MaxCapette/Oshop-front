<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Sur les setters, j'ai laissé un petit ": self". Ce truc là sert à typer le retour d'une fonction
 * (en gros, ça oblige le dev qui code dans la fonction à retourner le bon type).
 * On peut le faire pour n'importe quel type depuis PHP 7 (: int, : string, : array, : bool, etc).
 * Ici, le mot self indique que le type, c'est l'objet dans lequel on se trouve.
 * Donc étant dans la classe Category, self indique qu'on retourne un objet Category.
 */

class Category extends CoreModel
{
    private $name;

    private $subtitle;

    private $picture;

    private $home_order;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function getHomeOrder()
    {
        return $this->home_order;
    }

    public function setHomeOrder($home_order): self
    {
        $this->home_order = $home_order;
        return $this;
    }

    /**
     * Retourne la liste de toutes les catégories de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel trier
     *
     * @return Category[]
     */
    public function findAll($sort = "")
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM category";

        // Si $sort n'est pas vide, alors on ajoute ORDER BY dans notre requete SQL
        if ($sort !== "") {
            $sql .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des catégories");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);
    }

    /**
     * Retourne une catégorie spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Category
     */
    public function find($id)
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("SELECT * FROM `category` WHERE `id` = $id");
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la catégorie n°$id");
        }

        return $pdoStatement->fetchObject(Category::class);
    }

    public function findAllForHomepage(){
         $pdo = Database::getPDO();

        $sql = "SELECT * FROM category WHERE home_order > 0 ORDER BY home_order";
        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des catégories de la Homepage");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);
    }
}