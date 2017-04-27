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
$crud= isset($_POST['crud']) ? $_POST['crud'] : "read";

$id=isset($_POST["personId"]) ? $_POST["personId"] : '';
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
                $id=(int) $id;
                $groupeDB= $mon_manager->affichePersonne($id);
                
            }else{
                $groupeDB= $mon_manager->affichePersonne();
            }
            break;
        case "create":
            foreach($groupe as $key=>$value){
                $mon_manager->insertPersonne($value);
                $groupeDB=$mon_manager->affichePersonne();
            }
            break;
        case "update":
            if(!empty($id) && !empty($nom) && !empty($prenom) && !empty($adresse) && !empty($codePostal) && !empty($pays) && !empty($societe)){
                //Création de l'objet personne
                
                $personneUpdate= new Personne();
                $personneUpdate->setPersonneId($id);
                $personneUpdate->setNom($nom);
                $personneUpdate->setPrenom($prenom);
                $personneUpdate->setAdresse($adresse);
                $personneUpdate->setCodePostal($codePostal);
                $personneUpdate->setPays($pays);
                $personneUpdate->setSociete($societe);
               try{
                   $mon_manager->updatePersonne($id,$personneUpdate);
                   
               }catch(Exception $e){
                   throw $e;
               } 
               $groupeDB=$mon_manager->affichePersonne($id); 
                
                
            }
            break;
        case "delete":
            if(!empty($id)){
                try{
                    $mon_manager->deletePersonne($id);
                    
                    $groupeDB=$mon_manager->affichePersonne();
                }catch(Exception $e){
                    throw $e;
                }
            }
            break;
    }
    
}




