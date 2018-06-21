<?php

class Pizza extends Plat {

    //Attributs
    private $pate;
    private $base;

    //Constructeur
    public function __construct() {
        parent::__construct();
    }

    //Méthodes
    public function getPizzas($db) {
        $req = $db->prepare('SELECT * FROM pizzas JOIN plats on pizzas.plat_id = plats.id');
        $req->execute();
        return $row = $req->fetchAll();
    }

    public function creerPizza($db, $nom, $prix, $ingredients, $pate, $base) {
        $plat = parent::creerPlat($db, $nom, $prix, $ingredients);
        $req2 = $db->prepare('SELECT id FROM plats where nom = :nom');
        $req2->execute(array(
            ':nom' => $nom
        ));
        $id = $req2->fetchAll();

        $req = $db->prepare('INSERT INTO pizzas(pate, base, plat_id) VALUES (:pate, :base, :plat_id)');
        $req->execute(array(
            ':pate' => $pate,
            ':base' => $base,
            ':plat_id' => $id[0]['id']
        ));
    }

    public function editerPatePizza($db, $pate, $plat_id) {
        $req = $db->prepare('UPDATE pizzas SET pate = :pate, base = base WHERE plat_id = :plat_id');
        $req->execute(array(
            ':pate' => $pate,
            ':plat_id' => $plat_id
        ));
    }

    public function editerBasePizza($db, $base, $plat_id) {
        $req = $db->prepare('UPDATE pizzas SET pate = pate, base = :base WHERE plat_id = :plat_id');
        $req->execute(array(
            ':base' => $base,
            ':plat_id' => $plat_id
        ));
    }

    public function supprimerPizza($db, $pizza_id) {

        $req = $db->prepare('DELETE FROM pizzas WHERE plat_id = :id');
        $req->execute(array(
            ':id' => $pizza_id
        ));

        parent::supprimerPlat($db, $pizza_id);
    }

}

?>
