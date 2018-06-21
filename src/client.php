<?php

class Client {

    //Attributs
    private $nom;
    private $adresse;
    private $num_tel;

    //Methodes
    public function getClients($db) {
        $req = $db->prepare('SELECT * FROM clients');
        $req->execute();
        return $row = $req->fetchAll();
    }

    /*
      public function afficherClients($liste_clients){
      foreach($liste_clients as $client){
      echo 'Nom :'. $client['nom'].' | Adresse :'. $client['adresse'].' | Telephone : '.$client['num_tel'].'\n';
      }
      }
     */

    public function creerClient($db, $nom, $adresse, $num) {

        $req = $db->prepare('INSERT INTO clients(nom, adresse, num_tel) VALUES (:nom, :adresse, :num)');
        $req->execute(array(
            ':nom' => $nom,
            ':adresse' => $adresse,
            ':num' => $num
        ));
    }

    public function editerAdresseClient($db, $adresse, $client_id) {
        $req = $db->prepare('UPDATE clients SET nom = nom, adresse = :newAdresse, num_tel = num_tel WHERE id = :id');
        $req->execute(array(
            ':newAdresse' => $adresse,
            ':id' => $client_id
        ));
    }

    public function editerNumClient($db, $num, $client_id) {
        $req = $db->prepare('UPDATE clients SET nom = nom, adresse = adresse, num_tel = :newNum WHERE id = :id');
        $req->execute(array(
            ':newNum' => $num,
            ':id' => $client_id
        ));
    }

    public function supprimerClient($db, $client_id) {
        $req = $db->prepare('DELETE FROM clients WHERE id = :id');
        $req->execute(array(
            ':id' => $client_id
        ));
    }

}
?>

