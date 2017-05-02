<?php
ini_set("display_errors",1);
use \ISL\MvcExample\Controller\FrontController;

require_once dirname(__FILE__).'/../vendor/autoload.php';


 $controller = new FrontController();
 $response = $controller->processRequest();

echo $response;