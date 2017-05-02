<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 14/04/16
 * Time: 14:00
 */

namespace ISL\MvcExample\View;


class HomeView extends SimpleView{

	public function __construct( $templateDir=null ) {
		parent::__construct( $templateDir );

		$this->content = file_get_contents( $this->templateDir . '/home.tpl.html' );
	}

	public function setCategories($categories){

		include $this->templateDir . '/home/bloc_categories.php';
		$cats = ob_get_clean();

		$this->content = preg_replace( '/\{bloc_categories\}/',$cats , $this->content );

	}
}