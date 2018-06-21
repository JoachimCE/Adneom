<?php

class Plat {

    //Attributs
    private $nom;
    private $prix;
    private $ingredients;

    //Constructeur
    public function __construct() {
        
    }

    //Méthodes
    public function getPlats($db) {
        $req = $db->prepare('SELECT * FROM plats');
        $req->execute();
        return $row = $req->fetchAll();
    }

    public function creerPlat($db, $nom, $prix, $ingredients) {
        try {
            $db->beginTransaction();
            $req = $db->prepare('INSERT INTO plats(nom, prix, ingredients) VALUES (:nom, :prix, :ingredients)');
            $req->execute(array(
                ':nom' => $nom,
                ':prix' => $prix,
                ':ingredients' => $ingredients
            ));
            $db->commit();
        } catch (Exception $e) {
            echo 'Exception : ', $e->getMessage(), "\n";
        }
    }

    public function editerPrixPlat($db, $prix, $plat_id) {
        $req = $db->prepare('UPDATE plats SET nom = nom, prix = :prix, ingredients = ingredients WHERE id = :id');
        $req->execute(array(
            ':prix' => $prix,
            ':id' => $plat_id
        ));
    }

    public function editerNomPlat($db, $nom, $plat_id) {
        $req = $db->prepare('UPDATE plats SET nom = :nom, prix = prix, ingredients = ingredients WHERE id = :id');
        $req->execute(array(
            ':nom' => $nom,
            ':id' => $plat_id
        ));
    }

    public function editerIngredientsPlat($db, $ingredients, $plat_id) {
        $req = $db->prepare('UPDATE plats SET nom = nom, prix = prix, ingredients = :ingredients WHERE id = :id');
        $req->execute(array(
            ':ingredients' => $ingredients,
            ':id' => $plat_id
        ));
    }

    public function supprimerPlat($db, $plat_id) {
        $req = $db->prepare('DELETE FROM plats WHERE id = :id');
        $req->execute(array(
            ':id' => $plat_id
        ));
    }

}

?>
