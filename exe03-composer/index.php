<?php
require_once __DIR__."/vendor/autoload.php";
use ISL\Manager\PersonneManager;
$nombre=  isset($_POST["nombre"])?$_POST["nombre"]: 2;
$mon_manager = new PersonneManager();
$groupe=PersonneManager::create($nombre);
//$groupe=$mon_manager::create($nombre); ?fonctionne aussi?
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
    </head>
    <body>
        <div id="main">
            <h1>Exercice 3 - initiation Composer</h1>
            <form action="#" method="POST" name="">
                <input type="range" min="2" max="20" name="nombre" value=""/>
                <input type="submit" name="submit" value="Envoyer" />
            </form>
            <pre>
                <?php
                isset($groupe)? print_r($groupe): "Une erreur est survenue";
                ?>
            </pre>
            <table>
                
            </table>
                
            
            
        </div>
        
    </body>
</html>
