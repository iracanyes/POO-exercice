<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 6/04/16
 * Time: 16:47
 */


namespace ISL\MvcExample\Controller;


//use ISL\MvcExample\Model\BaseProjetCategorieEntity;
//use ISL\MvcExample\Model\Category;
use ISL\MvcExample\Model\CategoryManager;
use ISL\MvcExample\View\HomeView;
//use ISL\MvcExample\View\SimpleView;

class HomeController extends AbstractController{


	/**
	 * @var \PDO
	 */
	protected $connex;

	public function __construct() {

		$this->connex = new \PDO('mysql:dbname=isl_2016_php;host=127.0.0.1', 'isl_iracanyes', '');
		// arbitraire : devrait être géré par configuration
		$this->view = new HomeView();


	}

	public function renderView(array $vars=null) {
		return $this->view->render($vars);
	}

	public function executeAction($parameters=array()) {
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

	protected function defaultAction() {

		// todo move this into model

		$categoryManager = new CategoryManager();
		$categoryManager->setConnection($this->connex);
		$categories = $categoryManager->retrieveAll();
                //var_dump($categories);
		$this->view->setCategories($categories);
		return $this->renderView();
	}

}