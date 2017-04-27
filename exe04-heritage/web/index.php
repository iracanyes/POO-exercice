<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../controler/home.php';



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
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css" />
    </head>
    <body>
        <div id="main">
            <h1>Exercice 4 - Héritage</h1>
            <form action="#" method="POST" name="">
                <label for="nombre">
                    Combien de personne aléatoire vous désirez:
                    <input type="range" min="1" max="20" name="nombre" value=""/>
                </label>
                <br />
                <input type="submit" name="submit" value="Lancer" />
            </form>
            <pre>
                <?php
                if(DEBUG){
                    isset($groupe) ? var_dump($groupe) : "";
                }
                
                ?>
            </pre>
            <pre>
                <?php //var_dump($faker);?>
            </pre>
            <?php 
            
                //tableEnseignant($data);
                
                //tableEtudiant($data);
            ?>
                
            
            
        </div>
        
    </body>
</html>





