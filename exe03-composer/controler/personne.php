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

$nom= isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom= isset($_POST['prenom']) ? $_POST['prenom'] : "";
$adresse= isset($_POST['adresse']) ? $_POST['adresse'] : "";
$ville= isset($_POST['ville']) ? $_POST['ville'] : "";
$codePostal= isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
$pays= isset($_POST['pays']) ? $_POST['pays'] : "";
$societe= isset($_POST['societe']) ? $_POST['societe'] : "";
$submit= isset($_POST['submit']) ? $_POST['submit'] : "";

switch($crud){
    case "create":
        
        break;
    case "create":
        break;
    case "create":
        break;
    case "create":
        break;
}


