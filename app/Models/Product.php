<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Product extends CoreModel
{
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getBrandId()
    {
        return $this->brand_id;
    }

    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
        return $this;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
        return $this;
    }

    /**
     * Retourne la liste de tous les produits de la BDD
     *
     * @return Product[]
     */
    public function findAll()
    {
        // Connexion à la base de données en utilisant la classe Database
        // (dont on a pas besoin de connaître le contenu)
        $pdo = Database::getPDO();

        // Créer la bonne requete SQL
        $sql = "SELECT * FROM product";

        // On va devoir l'exécuter
        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des produits");
        }

        // On récupèrera le résultat sous forme d'objets
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        // On retournera le résultat
        return $results;
    }

    /**
     * Retourne un produit spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Product
     */
    public function find($id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM product WHERE id = $id";

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération du produit n°$id");
        }

        $result = $pdoStatement->fetchObject(Product::class);

        return $result;
    }

    /**
     * Retourne la liste de tous les produits d'une catégorie depuis la BDD
     *
     * @param int $categoryId
     *
     * @return Product[]
     */
    public function findByCategory($categoryId)
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("SELECT * FROM product WHERE category_id = $categoryId");
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des produits de la catégorie n°$categoryId");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    /**
     * Retourne la liste de tous les produits d'un type depuis la BDD
     *
     * @param int $typeId
     *
     * @return Product[]
     */
    public function findByType($typeId)
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("SELECT * FROM product WHERE type_id = $typeId");
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des produits du type n°$typeId");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);
    }

    /**
     * Retourne la liste de tous les produits d'une marque depuis la BDD
     *
     * @param int $brandId
     *
     * @return Product[]
     */
    public function findByBrand($brandId)
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("SELECT * FROM product WHERE brand_id = $brandId");
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des produits de la marque n°$brandId");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);
    }
}