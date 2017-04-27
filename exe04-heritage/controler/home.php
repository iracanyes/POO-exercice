<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__."/../vendor/autoload.php";

use ISL\Manager\PersonneManager;
use ISL\Manager\EnseignantManager;
use ISL\Manager\EtudiantManager;

$personneManager=new PersonneManager();
//$etudiantsManager=new EtudiantManager();
//$enseignantManager=new EnseignantManager();

//Création de personne aléatoire
try{
    $nbre= isset($_POST["nombre"]) ? $_POST["nombre"] : 2;
    $groupe=  PersonneManager::generate($nbre);
}catch(Exception $e){
    throw  $e;
}



//Inclure la librairie de fonction
//require_once '/../lib/home.php';
switch($crud){
    
}
