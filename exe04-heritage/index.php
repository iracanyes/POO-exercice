<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__."/vendor/autoload.php";
use ISL\Manager\PersonneManager;


$faker = Faker\Factory::create("fr_BE");
$nbre= isset($_POST["nombre"]) ? $_POST["nombre"] : 1;

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
    </head>
    <body>
        <div id="main">
            <h1>Exercice 4 - Héritage</h1>
            <form action="#" method="POST" name="">
                <label for="nombre">
                    Nombre de personne:
                    <input type="range" min="1" max="20" name="nombre" value=""/>
                </label>
                
                <input type="submit" name="submit" value="Envoyer" />
            </form>
            <pre>
                <?php
                var_dump(PersonneManager::generate($faker,$nbre));
                ?>
            </pre>
            <pre>
                <?php var_dump($faker);?>
            </pre>
            <table>
                
            </table>
                
            
            
        </div>
        
    </body>
</html>





