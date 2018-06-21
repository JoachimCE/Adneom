<?php

include('conf/autoload.php');
include('src/plat.php');
include('src/client.php');
include('src/commande.php');
include('src/pizza.php');
include('src/sandwich.php');


$choix = 0;
echo "*************** Gestion Snack *********************\n";
echo "1 - Gestion des clients\n";
echo "2 - Gestion des pizzas\n";
echo "3 - Gestion des Sandwichs\n";
echo "4 - Gestion des commandes\n";
echo "5 - Quitter\n";
echo "*************** Gestion Snack *********************\n";
echo "Veuillez selectionner votre choix::";

$choix = trim(fgets(STDIN));

switch ($choix) {
    case 1:
        $liste_clients = new Client;
        $liste = $liste_clients->getClients($db);
        foreach ($liste as $client) {
            echo "ID:" . $client['id'] . "Nom :" . $client['nom'] . " | Adresse :" . $client['adresse'] . " | Telephone : " . $client['num_tel'] . "\n";
        }
        echo "*************Gestion des clients**************\n";
        echo "1 - Creation d'un client\n";
        echo "2 - Modification d'un client\n";
        echo "3 - Supprimer d'un client\n";
        echo "4 - Quitter\n";
        echo "Indiquez le numero de l'opération souhaitee :";
        $choix = trim(fgets(STDIN));
        switch ($choix) {
            case 1 :
                echo "Nom du client :";
                $nom = trim(fgets(STDIN));
                echo "Adresse du client:";
                $adresse = trim(fgets(STDIN));
                echo "Numero de telephone du client:";
                $num = trim(fgets(STDIN));
                $newClient = new Client;
                $newClient->creerClient($db, $nom, $adresse, $num);
                break;
            case 2 :
                echo "Quel est l'id du client que vous souhaitez modifier ?";
                $id = trim(fgets(STDIN));
                echo "Souhaitez vous modifier :\n 1 - Son adresse ? \n 2 - Son numï¿½ro de tï¿½lï¿½phone ?\n";
                $choix = trim(fgets(STDIN));
                if ($choix == 1) {
                    echo "Nouvelle adresse du client :";
                    $newAdresse = trim(fgets(STDIN));
                    $newClient = new Client;
                    $newClient->editerAdresseClient($db, $newAdresse, $id);
                } else {
                    echo "Nouveau numero du client :";
                    $newNum = trim(fgets(STDIN));
                    $newClient = new Client;
                    $newClient->editerNumClient($db, $newNum, $id);
                }
                break;
            case 3 :
                echo "Quel est l'id du client que vous souhaitez supprimer ?";
                $id = trim(fgets(STDIN));
                $newClient = new Client;
                $newClient->supprimerClient($db, $id);
                break;
            case 4 :
                echo shell_exec('php index.php');
                break;
        }
        break;
    case 2:
        echo "*************Gestion des pizzas*****************\n";
        echo "1 - Creer une pizza\n";
        echo "2 - Modifier une pizza\n";
        echo "3 - Supprimer une pizza \n";
        echo "4 - Quitter\n";

        $liste_pizzas = new Pizza;
        $liste = $liste_pizzas->getPizzas($db);
        echo "Liste des pizzas \n";
        foreach ($liste as $pizza) {
            echo "ID: " . $pizza['id'] . " | nom : " . $pizza['nom'] . " | ingredients : " . $pizza['ingredients'] . " | Base : " . $pizza['base'] . " | Pate : " . $pizza['pate'] . "| prix : " . $pizza['prix'] . " \n";
        }

        echo "Indiquez le numéro de l'operation souhaitee :";

        $choix = trim(fgets(STDIN));

        switch ($choix) {
            case 1 :
                echo "Nom de la pizza :";
                $nom = trim(fgets(STDIN));
                echo "Prix de la pizza:";
                $prix = trim(fgets(STDIN));
                echo "Ingredients:";
                $ingredients = trim(fgets(STDIN));
                echo "Pate:";
                $pate = trim(fgets(STDIN));
                echo "Base:";
                $base = trim(fgets(STDIN));
                $newPizza = new Pizza;
                $newPizza->creerPizza($db, $nom, $prix, $ingredients, $pate, $base);
                break;
            case 2 :
                echo "Quel est l'id de la pizza que vous souhaitez modifier ?";
                $id = trim(fgets(STDIN));
                echo "Souhaitez vous modifier :\n 1 - Son prix ? \n 2 - Ses ingrÃ©dients ?\n 3 - Sa pate ? \n 4 - Sa base ?";
                $choix = trim(fgets(STDIN));
                switch ($choix) {
                    case 1:
                        echo "Nouveau prix de la pizza :";
                        $newPrix = trim(fgets(STDIN));
                        $newPizza = new Pizza;
                        $newPizza->editerPrixPizza($db, $newPrix, $id);
                        break;
                    case 2 :
                        echo "Nouveaux ingredients de la pizza :";
                        $newIngredients = trim(fgets(STDIN));
                        $newPizza = new Plat;
                        $newPizza->editerIngredientsPlat($db, $newIngredients, $id);
                        break;
                    case 3 :
                        echo "Nouveaux ingredients de la pizza :";
                        $newIngredients = trim(fgets(STDIN));
                        $newPizza = new Pizza;
                        $newPizza->editerIngredientsPlats($db, $newIngredients, $id);
                        break;
                    case 4 :
                        echo "Nouveaux ingredients de la pizza :";
                        $newIngredients = trim(fgets(STDIN));
                        $newPizza = new Pizza;
                        $newPizza->editerIngredientsPizza($db, $newIngredients, $id);
                        break;
                }
                break;
            case 3 :
                echo "Quel est l'id de la pizza que vous souhaitez supprimer ?";
                $id = trim(fgets(STDIN));
                $newPizza = new Pizza;
                $newPizza->supprimerPizza($db, $id);
                break;
            case 4 :
                echo shell_exec('php index.php');
                break;
        }

        break;
    case 3:
        echo "*************Gestion des sandwichs*****************\n";
        echo "1 - Creer un sandwich\n";
        echo "2 - Modifier un sandwich\n";
        echo "3 - Supprimer un sandwich \n";
        echo "4 - Quitter\n";
        $liste_sandwichs = new Sandwich;
        $liste = $liste_sandwichs->getSandwichs($db);
        echo "Liste des sandwichs \n";
        foreach ($liste as $sandwich) {
            echo "ID: " . $sandwich['id'] . " | nom : " . $sandwich['nom'] . " | ingredients : " . $sandwich['ingredients'] . " | Pain : " . $sandwich['pain'] . "| prix : " . $sandwich['prix'] . " \n";
        }

        echo "Indiquez le numero de l'opération souhaitee :";
        $choix = trim(fgets(STDIN));
        switch ($choix) {
            case 1 :
                echo "Nom du sandiwch :";
                $nom = trim(fgets(STDIN));
                echo "Prix du sandwich:";
                $prix = trim(fgets(STDIN));
                echo "Ingredients:";
                $ingredients = trim(fgets(STDIN));
                echo "Pain:";
                $pain = trim(fgets(STDIN));
                $newSand = new Sandwich;
                $newSand->creerSandwich($db, $nom, $prix, $ingredients, $pain);
                break;
            case 2 :
                echo "Quel est l'id du sandwich que vous souhaitez modifier ?";
                $id = trim(fgets(STDIN));
                echo "Souhaitez vous modifier :\n 1 - Son prix ? \n 2 - Ses ingredients ?\n 3 - Son pain ?\n";
                $choix = trim(fgets(STDIN));
                switch ($choix) {
                    case 1:
                        echo "Nouveau prix du sandwich :";
                        $newPrix = trim(fgets(STDIN));
                        $newSandwich = new Sandwich;
                        $newSandwich->editerPrixSandwich($db, $newPrix, $id);
                        break;
                    case 2 :
                        echo "Nouveaux ingredients du sandwich :";
                        $newIngredients = trim(fgets(STDIN));
                        $newSandwich = new Plat;
                        $newSandwich->editerIngredientsPlat($db, $newIngredients, $id);
                        break;
                    case 3 :
                        echo "Nouveaux pain du sandwich :";
                        $newIngredients = trim(fgets(STDIN));
                        $newSandwich = new Sandwich;
                        $newSandwich->editerPainSandwich($db, $newIngredients, $id);
                        break;
                }
                break;
            case 3 :
                echo "Quel est l'id du sandwich que vous souhaitez supprimer ?";
                $id = trim(fgets(STDIN));
                $newSandwich = new Sandwich;
                $newSandwich->supprimerSandwich($db, $id);
                break;
            case 4 :
                echo shell_exec('php index.php');
                break;
        }
        break;
    case 4:
        echo "*************Commandes*****************\n";
        echo "1 - Creer une commande \n";
        echo "2 - Modifier l'etat d'une commande \n";
        echo "3 - Annuler une commande \n";
        echo "4 - Quitter \n";
        echo "\n";
        $liste_commandes = new Commande;
        $liste = $liste_commandes->getCommandes($db);
        echo "Liste des commandes \n";
        foreach ($liste as $commande) {
            echo "ID: " . $commande['id'] . " | Adresse : " . $commande['adresse_livraison'] . " | Adresse : " . $commande['produit'] . "| Etat : " . $commande['etat'] . " \n";
        }
        echo"\n Liste des clients : \n";
        $liste_clients = new Client;
        $liste = $liste_clients->getClients($db);
        foreach ($liste as $client) {
            echo "ID:" . $client['id'] . "Nom :" . $client['nom'] . " | Adresse :" . $client['adresse'] . " | Telephone : " . $client['num_tel'] . "\n \n";
        }
        echo "Indiquez le numéro de l'operation souhaitee : ";
        $choix = trim(fgets(STDIN));
        switch ($choix) {
            case 1 :
                echo "Adresse de livraison :";
                $adresse = trim(fgets(STDIN));
                echo "Produit commande:";
                $produit = trim(fgets(STDIN));
                echo "Id du client";
                $client_id = trim(fgets(STDIN));
                $newCommande = new Commande;
                $newCommande->creerCommande($db, $produit, $adresse, $client_id);
                break;
            case 2 :
                echo "Quel est l'id de la commande que vous souhaitez modifier ? ";
                $id = trim(fgets(STDIN));
                echo "A quel etat souhaitez vous passer la commande ?(1 pour en cours de preparation, 2 pour en cours de livraison, 3 pour livree) ";
                $etat = trim(fgets(STDIN));
                $newCommande = new Commande;
                $newCommande->editerEtatCommande($db, $id, $etat);
                break;
            case 3 :
                echo "Quel est l'id de la commande que vous souhaitez supprimer ?";
                $id = trim(fgets(STDIN));
                $newCommande = new Commande;
                $newCommande->supprimerCommande($db, $id);
                break;
            case 4 :
                echo shell_exec('php index.php');
                break;
            default:
                echo "votre choix est invalide";
        }
}
?>