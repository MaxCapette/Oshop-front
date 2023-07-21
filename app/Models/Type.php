<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Model servant à gérer les types
 */
class Type extends CoreModel
{
    /** @var string */
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Retourne la liste de tous les types de la BDD
     *
     * @param string $sort Contient le nom d'un champ sur lequel trier
     *
     * @return Type[]
     */
    public function findAll($sort = "")
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM type";

        // Si $sort n'est pas vide, alors on ajoute ORDER BY dans notre requete SQL
        if ($sort !== "") {
            $sql .= " ORDER BY $sort";
        }

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des types");
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);
    }

    /**
     * Retourne un type spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Type
     */
    public function find($id)
    {
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query("SELECT * FROM type WHERE id = $id");
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération du type n°$id");
        }

        return $pdoStatement->fetchObject(Type::class);
    }
}