<?php
//Autoriser l'affichage des erreurs en développement
ini_set("display_errors", 1);

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
            
            
        </div>
        
    </body>
</html>
