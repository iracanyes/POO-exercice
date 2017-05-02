<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\MvcExample\View;

class ProjetView extends SimpleView{
    
    public function __construct($templateDir = null) {
        parent::__construct($templateDir);
        
        $this->content= file_get_contents($this->templateDir."/projet.tpl.html");
        
    }
    
    public function setCategories($categories){

		include $this->templateDir . '/home/bloc_categories.php';
		$cats = ob_get_clean();

		$this->content = preg_replace( '/\{bloc_categories\}/',$cats , $this->content );
    }
}
