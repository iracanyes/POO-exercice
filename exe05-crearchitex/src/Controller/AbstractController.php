<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 6/04/16
 * Time: 16:47
 */

namespace ISL\MvcExample\Controller;


use ISL\MvcExample\Model\AbstractManager;
use ISL\MvcExample\View\AbstractView;

abstract class AbstractController {

	/**
	 * @var AbstractView
	 */
	protected $view;

	/** @var  AbstractManager */
	protected $entityManager;

	public abstract function renderView(array $vars);

	public abstract function executeAction($parameters = null);

	protected abstract function defaultAction();

	/**
	 * @return AbstractView
	 */
	public function getView() {
		return $this->view;
	}

	/**
	 * @param AbstractView $view
	 */
	public function setView( $view ) {
		$this->view = $view;
	}

	/**
	 * @return mixed
	 */
	public function getModel() {
		return $this->model;
	}

	/**
	 * @param mixed $model
	 */
	public function setModel( $model ) {
		$this->model = $model;
	}


}