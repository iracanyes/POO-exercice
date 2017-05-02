<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 5/04/16
 * Time: 08:15
 */

namespace ISL\MvcExample\Controller;


use ISL\MvcExample\View\ErrorView;
use ISL\MvcExample\View\SimpleView;


class FrontController {


	private $template;

	// cette variable contient les routes possibles de l'application (les pages accessibles)
	// ainsi que les controllers qui y sont associés
	public static $routes = array(
		'home' => 'HomeController',
		'projet' => 'ProjetController'
	);

	public function __construct() {

	}

	public function processRequest() {
		/*
		$view = new SimpleView($this->template);
		$view->setTemplateName('main.tpl.html');
		$view->render();
		*/
		$parameters = $this->filterParameters($_REQUEST);

                

		try{
			$controller = $this->retrieveControllerClass( $parameters['pageName'] );

			$response =	$controller->executeAction( $parameters['action'], $_SERVER['REQUEST_METHOD'], $parameters );
                        echo $response;
			return $response;
		}catch(\Exception $e){
			$v = new ErrorView();
			$v->setErrrorCode($e->getCode(), $e->getMessage());
			echo $v->render();

		}


	}

	private function retrieveControllerClass($pageName){
		if ( key_exists( $pageName, self::$routes ) ) {
			$controllerClass = __NAMESPACE__ . "\\" . self::$routes[ $pageName ];
			return new $controllerClass();
		} else {
			throw new \Exception('page not found', 404);

		}

	}

	private function sanitize($param){
		return strip_tags(htmlentities($param));
	}

	private function filterParameters(){
		$pageName = isset( $_REQUEST['p'] ) && ! is_null( $_REQUEST['p'] ) ? $this->sanitize($_REQUEST['p']) : 'home';
		$action = isset( $_REQUEST['action'] ) && ! is_null( $_REQUEST['action']) ? $this->sanitize($_REQUEST['action']) : 'default';
		$method = $_SERVER['REQUEST_METHOD'];
		$parameters = array();
		foreach($_REQUEST as $key => $val){
			if($key != 'page' && $key != 'action'){
				// TODO : filtrez les paramètres (pensez aux licornes qui tuent des chatons lorsque  vous ne le faites pas)
				$parameters[$key] = $this->sanitize($val);
			}
		}

		return array( 'method' => $method, 'action' => $action, 'pageName' => $pageName, 'parameters' => $parameters );
	}

}