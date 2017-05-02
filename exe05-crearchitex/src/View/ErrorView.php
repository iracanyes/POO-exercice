<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 14/04/16
 * Time: 10:47
 */

namespace ISL\MvcExample\View;


class ErrorView extends SimpleView{


	public function setErrrorCode($code, $text=''){
		$error = file_get_contents($this->templateDir.'/error.tpl.html');
		$error = preg_replace('/\{code\}/', $code, $error);
		$error = preg_replace('/\{text\}/', $text, $error);
		$this->setContent($error);

	}
}