<?php

/* 
 * Fichier de test: Générateur de calculs
 */
//Inclure le fichier contenant la classe "operationsGenerator"
require_once './generator.php';
require_once './solver.php';
/*********** GENERATEUR DE CALCUL *******************************/
//Instanciation de l'objet
$generateur_calcul = new OperationsGenerator();

//Génére les opérations aléatoires
$generateur_calcul->genererOperations(12);

//Affichage des opérations 
$generateur_calcul->afficheOperations();

//Vérification 
$operation = $generateur_calcul->getOperations();


/***************** RESOLVEUR DE CALCUL ***************************/
//Création de la calculatrice 
$resolution_calcul = new OperationSolver();

//print_r($operation['addition']);
echo "<h2>Opération solver</h2>";

$data = ["87 / 56","123 - 65","1365 + 4568","0.65 * 65000"];


 
 

 
$table = $resolution_calcul->solve($data);

//$table = array_map($resolution_calcul->solve, $data);
//var_dump($table);
var_dump($resolution_calcul->getOperations());


print_r($resolution_calcul->getOperations());