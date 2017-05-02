<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 21/04/16
 * Time: 20:58
 */

namespace ISL\MvcExample\Model;


class CategoryManager extends AbstractManager{

	/**
	 * @var \PDO $connexion
	 */
	private $connexion;

	public function setConnection( \PDO $pdo ) {
		$this->connexion = $pdo;
	}

	/** @return \PDO */
	protected function getConnection() {
		// TODO: Implement getConnection() method.
	}

	public function create( BaseEntity $entity ) {
		// TODO: Implement create() method.
	}

	public function update( BaseEntity $entity ) {
		// TODO: Implement update() method.
	}

	public function delete( BaseEntity $entity ) {

	}

	public function retrieve( $id ) {
		// TODO: Implement retrieve() method.
	}

	public function retrieveAll() {
		$stmt = $this->connexion->query("SELECT * FROM projet_categorie");

		$stmt->execute();

		$res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return array_map(function($cat){return new Category($cat);}, $res);




	}
}