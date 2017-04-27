<?php
//Autoriser l'affichage des erreurs en développement

define("DEBUG", true);

if(DEBUG === true){
    ini_set("display_errors", 1);
}

require_once __DIR__."/vendor/autoload.php";

$nombre=  isset($_POST["nombre"])?$_POST["nombre"]: 2;

include_once 'controler/personne.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>POO Exercice 03 - Composer, namespace et autoloading</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            #main{
                width:90%;
                margin: 10px auto;
            }
            th,td{
                width:200px;
                border:1px solid #bbbbbc;
                padding:2px;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <h1>Exercice 3 - initiation Composer</h1>
            <form action="#" method="POST" name="formNbrePersonnes">
                <label for="nombre">Nombre de personnes à créer:
                    <input type="number" min="2" max="20" name="nombre" value="<?php echo $nombre; ?>"/>
                </label>
                
                <input type="submit" name="submit" value="Envoyer" />
            </form>
            
            <table>
                <caption>Groupe aléatoire</caption>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Code postal</th>
                        <th>Pays</th>
                        <th>Société</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php 
                        foreach($groupe as $key=>$value){
                            echo "<tr>"
                                    . "<td>".$value->getNom()."</td>"
                                    . "<td>".$value->getPrenom()."</td>"
                                    . "<td>".$value->getAdresse()."</td>"
                                    . "<td>".$value->getVille()."</td>"
                                    . "<td>".$value->getCodePostal()."</td>"
                                    . "<td>".$value->getPays()."</td>"
                                    . "<td>".$value->getSociete()."</td>"
                                . "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <pre>
                <?php
                isset($groupe)? print_r($groupe): "Une erreur est survenue";
                ?>
            </pre>    
            <form id="crud" action="#" method="POST"  autocomplete="true">
                <fieldset>
                    <legend>Personne</legend>
                    <fieldset>
                        <legend>Type d'échange</legend>
                        <label for="crud">
                            Action sur la table "personne" : <br />
                            <input type="radio" name='crud' value='create' /> Confirmez l'ajout des personnes <br />
                            <input type="radio" name='crud' value='read' /> Affichez une personne(id>0) ou toute la table (id=0) <br />
                            <input type="radio" name='crud' value='update' /> Mise à jour d'une personne via son ID <br />
                            <input type="radio" name='crud' value='delete' /> Supprimer une personne via son ID <br />
                        </label>
                        <label for="personId">
                            Personne ID:
                            <input type="number" id="personId" name="personId" min='0' max='10'  value="<?php echo $personId;?>"/>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>Information de la personne</legend>
                        
                        <label for="nom">
                            Nom:
                            <input type="text" id="nom" name="nom" value="<?php echo $nom;?>"/>
                        </label>
                        <label for="prenom">
                            Prénom:
                            <input type="text" id="prenom" name="prenom" value="<?php echo $prenom;?>"/>
                        </label><br />
                        <label for="adresse">
                            Adresse:
                            <input type="text" id="adresse" name="adresse" value="<?php echo $adresse;?>"/>
                        </label>
                        <br />
                        
                        <label for="codePostal">
                            Code postal:
                            <input type="number" min="1000" max="9999"  id="codePostal" name="codePostal" value="<?php echo $codePostal;?>"/>
                        </label>
                        <br />
                        <label for="pays">
                            Pays :
                            <input type="text" id="pays" name="pays" value="<?php echo $pays;?>"/>
                        </label>
                        <br />
                         <label for="societe">
                            Société :
                            <input type="text" id="societe" name="societe" value="<?php echo $societe;?>"/>
                        </label>
                    </fieldset>
                    
                </fieldset>
                
                
                <input type="submit" name="submit" value="Envoyer" />
            </form>
            <table>
                <caption>Groupe aléatoire DB</caption>
                <thead>
                    <tr>
                        <th>ID personne</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Code postal</th>
                        <th>Pays</th>
                        <th>Société</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php 
                    if(DEBUG){
                        echo "\n Groupe DB: ";
                        var_dump($groupeDB);
                    }
                    
                    if(isset($groupeDB)){
                        foreach($groupeDB as $key=>$value){
                            echo "<tr>"
                                    . "<td>".$value["personne_id"]."</td>"
                                    . "<td>".$value["nom"]."</td>"
                                    . "<td>".$value["prenom"]."</td>"
                                    . "<td>".$value["adresse"]."</td>"
                                    . "<td>".$value["codePostal"]."</td>"
                                    . "<td>".$value["pays"]."</td>"
                                    . "<td>".$value["societe"]."</td>"
                                . "</tr>";
                        }
                    }
                        
                    ?>
                </tbody>
            </table>
            
        </div>
        
    </body>
</html>
