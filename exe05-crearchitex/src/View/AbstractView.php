<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 5/04/16
 * Time: 17:45
 */

namespace ISL\MvcExample\View;


abstract class AbstractView {

	protected $templateName;

	protected $templateDir;


	abstract public function render();


	public function __construct( $templateDir ) {
		// si pas de répertoire spécifique pour les templates
		if ( $templateDir == null ) {
			// définition du repertoire par défaut
			$templateDir = dirname( __FILE__ ) . '/templates';
		}
		// si le répertoire en paramètre n'est pas de type directory
		if ( ! is_dir( $templateDir ) ) {
			throw new \InvalidArgumentException( "Le répertoire de templates n'existe pas" );
		}
		$this->templateDir = $templateDir;
	}

	public function setTemplateName($templateName){
		$this->templateName = $templateName;
	}

	public function getTemplateName(){
		return $this->templateName;
	}


	public function getTemplateDir() {
		return $this->templateDir;
	}


	public function setTemplateDir( $templateDir ) {
		$this->templateDir = $templateDir;
	}



}