<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 11/04/16
 * Time: 08:19
 */

namespace ISL\MvcExample\Model;


interface BaseProjetCategorieEntity {


	/**
	 * @return mixed
	 */
	public function getProjet_categorie_id();

	/**
	 * @param mixed $id
	 */
	public function setProjet_categorie_id( $projet_categorie_id );

}