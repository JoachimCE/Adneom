<?php

class Commande {

    //Attributs
    private $num_commande;
    private $etat;
    private $adresse_livraison;

    //Méthodes
    public function getCommandes($db) {
        $req = $db->prepare('SELECT * FROM commandes');
        $req->execute();
        return $row = $req->fetchAll();
    }

    public function creerCommande($db, $produit, $adresse_livraison, $client_id) {
        $req = $db->prepare('INSERT INTO commandes(produit, adresse_livraison, etat,client_id) VALUES (:produit, :adresse, :etat,:client_id)');
        $req->execute(array(
            ':produit' => $produit,
            ':adresse' => $adresse_livraison,
            ':etat' => 1,
            ':client_id' => $client_id
        ));
    }

    public function editerEtatCommande($db, $commande_id, $newEtat) {
        $req = $db->prepare('UPDATE commandes SET produit = produit, etat = :newEtat, adresse_livraison = adresse_livraison, client_id = client_id WHERE id = :id');
        $req->execute(array(
            ':newEtat' => $newEtat,
            ':id' => $commande_id
        ));
    }

    public function supprimerCommande($db, $commande_id) {
        $req = $db->prepare('DELETE FROM commandes WHERE id = :id');
        $req->execute(array(
            ':id' => $commande_id
        ));
    }

}

?>
