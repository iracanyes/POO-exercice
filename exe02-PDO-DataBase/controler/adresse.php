<?php

/* 
 * Contenu: 
 */
//Définition des classes utilisées et leur espace de nom 
use ISL\Entity\Adresse;
use ISL\AdresseManager\AdresseManager;

//Récupération des valeurs de formulaires
$crud= isset($_POST['crud']) ? $_POST['crud'] : "read";
$adresseId= isset($_POST['adresseId']) ? $_POST['adresseId'] : 0;
$rue = isset($_POST['rue']) ? $_POST['rue'] : "";
$numero=  isset($_POST['numero']) ? $_POST['numero'] : -1;
$localite= isset($_POST['localite']) ? $_POST['localite'] : "";
$codePostal= isset($_POST['codePostal']) ? $_POST['codePostal'] : "";
$pays= isset($_POST['pays']) ? $_POST['pays'] : "";
$submit= isset($_POST['submit']) ? $_POST['submit'] : "";

if(!empty($submit)  && !empty($crud)){
    switch($crud){
        case "create":
            if(!empty($rue) && !empty($numero) && !empty($localite) && !empty($codePostal) && !empty($pays)){
                
                //Création de l'objet adresse
                $adresse=new Adresse();
                
                $adresse->setRue(htmlentities($rue, ENT_QUOTES, "UTF-8"));
                $adresse->setNumero(htmlentities($numero, ENT_QUOTES, "UTF-8"));
                $adresse->setLocalite(htmlentities($localite, ENT_QUOTES, "UTF-8"));
                $adresse->setCodePostal(htmlentities($codePostal, ENT_QUOTES, "UTF-8"));
                $adresse->setPays(htmlentities($pays, ENT_QUOTES, "UTF-8"));

                $adresseManager=new AdresseManager();
                $adresseManager->insertAdresse($adresse);
                

            }else{
                if(empty($rue)){
                    $messError .="<br />Champ rue manquant <br />";
                }
                if(empty($numero)){
                    $messError .="<br />Champ numéro manquant <br />";
                }
                if(empty($localite)){
                    $messError .="<br />Champ localité manquant <br />";
                }
                if(empty($codePostal)){
                    $messError .="<br />Champ code postal manquant <br />";
                }
                if(empty($pays)){
                    $messError .="<br />Champ pays manquant <br />";
                }
            }
            break;
        case "read":
            if(!empty($adresseId)){
                $adresseManager=new AdresseManager();
                $resultat=$adresseManager->afficheAdresse($adresseId);
                
            }
            break;
        case "update":
            if(!empty($adresseId) && !empty($rue) && !empty($numero) && !empty($localite) && !empty($codePostal) && !empty($pays)){
                
                //Création de l'objet adresse
                $adresse=new Adresse();
                
                $adresse->setAdresseId(htmlentities($adresseId, ENT_QUOTES, "UTF-8"));
                $adresse->setRue(htmlentities($rue, ENT_QUOTES, "UTF-8"));
                $adresse->setNumero(htmlentities($numero, ENT_QUOTES, "UTF-8"));
                $adresse->setLocalite(htmlentities($localite, ENT_QUOTES, "UTF-8"));
                $adresse->setCodePostal(htmlentities($codePostal, ENT_QUOTES, "UTF-8"));
                $adresse->setPays(htmlentities($pays, ENT_QUOTES, "UTF-8"));

                $adresseManager=new AdresseManager();
                $adresseManager->updateAdresse($adresse);
                

            }else{
                if(empty($rue)){
                    $messError .="<br />Champ rue manquant <br />";
                }
                if(empty($numero)){
                    $messError .="<br />Champ numéro manquant <br />";
                }
                if(empty($localite)){
                    $messError .="<br />Champ localité manquant <br />";
                }
                if(empty($codePostal)){
                    $messError .="<br />Champ code postal manquant <br />";
                }
                if(empty($pays)){
                    $messError .="<br />Champ pays manquant <br />";
                }
            }
            break;
        case "delete":
            if(!empty($crud) && !empty($adresseId)){
                $adresseManager=new AdresseManager();
                $adresseManager->effaceAdresse($adresseId);
            }
            break;
    }
    
}