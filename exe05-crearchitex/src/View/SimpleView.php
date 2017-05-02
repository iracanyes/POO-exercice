<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 5/04/16
 * Time: 17:51
 */

namespace ISL\MvcExample\View;


class SimpleView extends AbstractView{

	protected $pageTitle, $content, $footer;


	public function __construct( $templateDir =null ) {
		parent::__construct( $templateDir );
		// valeurs par défaut
		$this->header = file_get_contents($this->templateDir.'/menu.tpl.html');
		$this->content = "<h1>This is the default content for the Simple View class</h1>";
		$this->footer = file_get_contents($this->templateDir.'/footer.tpl.html');
		$this->templateName =  'main.tpl.html';
	}

	public function render(){
		ob_start();
		$tpl = file_get_contents($this->templateDir.'/'.$this->getTemplateName());

		echo sprintf($tpl, $this->header, $this->content, $this->footer);

		return ob_get_clean();

	}

	/**
	 * @return mixed
	 */
	public function getPageTitle() {
		return $this->pageTitle;
	}

	/**
	 * @param mixed $pageTitle
	 */
	public function setPageTitle( $pageTitle ) {
		$this->pageTitle = $pageTitle;
	}

	/**
	 * @return mixed
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param mixed $content
	 */
	public function setContent( $content ) {
		$this->content = $content;
	}

	public function addContent($content){
		$this->content = sprintf("%s \n %s", $this->content, $content);
	}

	/**
	 * @return mixed
	 */
	public function getFooter() {
		return $this->footer;
	}

	/**
	 * @param mixed $footer
	 */
	public function setFooter( $footer ) {
		$this->footer = $footer;
	}



}