<?php

/* 
 * Contenu: Controler de la page Personne (POO Exe03)
 * Date:30/03/2017
 */
use ISL\Manager\PersonneManager;
use ISL\Entity\Personne;
$mon_manager = new PersonneManager();
$groupe=PersonneManager::create($nombre);

//Données de formulaires
$crud= isset($_POST['crud']) ? $_POST['crud'] : "";

$id=isset($_POST["personId"]) ? $_POST["personId"] : 0;
$nom= isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom= isset($_POST['prenom']) ? $_POST['prenom'] : "";
$adresse= isset($_POST['adresse']) ? $_POST['adresse'] : "";
$ville= isset($_POST['ville']) ? $_POST['ville'] : "";
$codePostal= isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
$pays= isset($_POST['pays']) ? $_POST['pays'] : "";
$societe= isset($_POST['societe']) ? $_POST['societe'] : "";
$submit= isset($_POST['submit']) ? $_POST['submit'] : "";
if(!empty($submit)){
    
    switch($crud){
        case "read":
            if(!empty($id)){

                $groupeDB= $mon_manager->affichePersonne($id);
                
            }
            break;
        case "create":
            foreach($groupe as $key=>$value){
                $mon_manager->insertPersonne($value);
            }
            break;
        case "update":
            break;
        case "delete":
            break;
    }
    /* Redirection
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php';
        echo "Hôte:".$host."<br />URI :".$uri."<br />Page :".$extra;
        header("Location: http://$host$uri/$extra");
     * 
     */
}




