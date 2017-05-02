<?php

/* 
 * Contenu : Class ProjetController
 */
namespace ISL\MvcExample\Controller;

use ISL\MvcExample\Model\CategoryManager;

class ProjetController extends AbstractController{
    
    protected $connexion;
    
    public function __construct() {
        //Création de la connexion
        $this->connexion=new \PDO('mysql:dbname=isl_2016_php;host=127.0.0.1', 'isl_iracanyes', '');
        
        //Création de l'objet ProjetView()
        $this->view= new ProjetView();
    }
    //Affichage de la page
    public function renderView(array $param=null) {
        //Mettre le contenu de la page(header,body+paramètre,footer) dans le modele de la page 
        $this->view->render($var);
    }
    
    protected function defaultAction() {
        // todo move this into model

        $categoryManager = new CategoryManager();
        $categoryManager->setConnection($this->connexion);
        $categories = $categoryManager->retrieveAll();
        //var_dump($categories);
        $this->view->setCategories($categories);
        return $this->renderView();
    }

    public function executeAction($parameters = array()) {
        if(! isset($parameters['action']) || $parameters['action'] == null || $parameters['action'] == 'default'){
                return $this->defaultAction();
        }

        if(method_exists($this, strtolower($parameters['action']).'Action')){
                $this->{$parameters['action'].'Action'}($parameters);
                return $this->renderView();

        }else{
                throw new \Exception('impossible de charger la page');
        }
    }

}
