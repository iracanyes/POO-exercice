<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Fonction permettant d'activer l'affichage des erreurs durant le développement
//En mode production, on mettra la valeur à 0
ini_set('display_errors', 1);

//Chargement de l'autoloader
require_once __DIR__."/vendor/autoload.php";


//Récupération de paramètre de la page
$page=isset($_GET['p']) ?$_GET['p'] : "adresse";

include_once 'controler/adresse.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>POO Exercice 02 - PDO et manipulation de la base de donnée</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            td,th{
                width: 150px;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <h1>POO Exercice 02 - PDO et manipulation de la base de donnée</h1>
            <form action="index.php?p=adresse" method="POST" name="adresse" autocomplete="true">
                <fieldset>
                    <legend>Adresse</legend>
                    <fieldset>
                        <legend>Type d'échange</legend>
                        <label for="crud">
                            Action utilisant l'ID unique d'adresse: <br />
                            <input type="radio" name='crud' value='read' /> Read <br />
                            <input type="radio" name='crud' value='update' /> Update <br />
                            <input type="radio" name='crud' value='delete' /> Delete <br />
                        </label>
                        <label for="adresseId">
                            Adresse ID:
                            <input type="number" id="adresseId" name="adresseId" min='0' max='10'  value="<?php echo $adresseId;?>"/>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>Information d'adresse</legend>
                        <label for="crud">
                            Compléter le formulaire(seulement pour create/update): 
                            <input type="radio" name='crud' value='create' /> Create <br />
                            
                        </label><br />
                        <label for="rue">
                            Rue:
                            <input type="text" id="rue" name="rue" value="<?php echo $rue;?>"/>
                        </label>
                        <label for="numero">
                            Numéro:
                            <input type="text" id="numero" name="numero" value="<?php echo $numero;?>"/>
                        </label><br />
                        <label for="localite">
                            Localité:
                            <input type="text" id="localite" name="localite" value="<?php echo $localite;?>"/>
                        </label>
                        <label for="codePostal">
                            Code postal:
                            <input type="number" min="1000" max="9999"  id="codePostal" name="codePostal" value="<?php echo $codePostal;?>"/>
                        </label><br />
                        <label for="pays">
                            Pays:
                            <input type="text" id="pays" name="pays" value="<?php echo $pays;?>"/>
                        </label>
                    </fieldset>
                    
                </fieldset>
                
                
                <input type="submit" name="submit" value="Envoyer" />
            </form>
            <pre>
                
                <?php 
                global $e;
                echo isset($e) ? $e->getMessage() : "";
                isset($resultat) ? var_dump($resultat) : "";
                ?>
            </pre>
            
            <table>
                <caption>Adresse</caption>
                <tr>
                    <th>Adresse_id</th>
                    <th>Rue</th>
                    <th>Numero</th>
                    <th>Localité</th>
                    <th>Code Postal</th>
                    <th>Pays</th>
                </tr>
                
                    <?php 
                    if(isset($resultat) && count($resultat) > 1){
                            echo "</tr>";
                            foreach($resultat as $key => $value){
                                echo  "<td>".$value."</td>";
                            }
                            echo "</tr>";
                        
                    }
                    ?>
                
                
            </table>
                
            
            
        </div>
        
    </body>
</html>