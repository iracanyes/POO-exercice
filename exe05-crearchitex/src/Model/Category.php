<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 14/04/16
 * Time: 13:12
 */

namespace ISL\MvcExample\Model;


class Category implements BaseProjetCategorieEntity{

	private $projet_categorie_id;

	private $categorie;

	private $description;


	public function __construct($data = array()) {
		foreach($data as $key => $val){
			if(method_exists($this, 'set'.strtoupper($key))){
				$this->{'set'.$key}($val);
			}
		}
	}

	public function getProjet_categorie_id() {
		return $this->projet_categorie_id;
	}

	public function setProjet_categorie_id( $projet_categorie_id ) {
		$this->projet_categorie_id = $projet_categorie_id;
	}

	/**
	 * @return mixed
	 */
	public function getCategorie() {
		return $this->categorie;
	}

	/**
	 * @param mixed $nom
	 */
	public function setCategorie( $categorie ) {
		$this->categorie = $categorie;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription( $description ) {
		$this->description = $description;
	}


}