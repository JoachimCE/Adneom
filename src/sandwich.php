<?php

class Sandwich extends Plat {

    //Attributs
    private $pain;

    //Méthodes
    public function getSandwichs($db) {
        $req = $db->prepare('SELECT * FROM sandwichs JOIN plats on sandwichs.plat_id = plats.id');
        $req->execute();
        return $row = $req->fetchAll();
    }

    public function creerSandwich($db, $nom, $prix, $ingredients, $pain) {
        try {
            $plat = parent::creerPlat($db, $nom, $prix, $ingredients);
            $req2 = $db->prepare('SELECT id FROM plats where nom = :nom');
            $req2->execute(array(
                ':nom' => $nom
            ));
            $id = $req2->fetchAll();
        } catch (Exception $e) {
            echo 'Exception reÃ§ue : ', $e->getMessage(), "\n";
        }

        $req = $db->prepare('INSERT INTO sandwichs(pain, plat_id) VALUES (:pain, :plat_id)');
        $req->execute(array(
            ':pain' => $pain,
            ':plat_id' => $id[0]['id']
        ));
    }

    public function editerPainSandwich($db, $pain, $plat_id) {
        $req = $db->prepare('UPDATE sandwichs SET pain = :pain WHERE plat_id = :plat_id');
        $req->execute(array(
            ':base' => $base,
            ':plat_id' => $plat_id
        ));
    }

    public function supprimerSandwich($db, $sandwich_id) {
        $req = $db->prepare('DELETE FROM sandwichs WHERE plat_id = :id ');
        $req->execute(array(
            ':id' => $sandwich_id
        ));

        parent::supprimerPlat($db, $sandwich_id);
    }

}

?>
