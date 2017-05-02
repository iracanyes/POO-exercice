<?php
/**
 * Created by PhpStorm.
 * User: gberger
 * Date: 11/04/16
 * Time: 08:16
 */

namespace ISL\MvcExample\Model;


abstract class AbstractManager {

	abstract public function setConnection(\PDO $pdo);

	/** @return \PDO*/
	abstract protected function getConnection();

	abstract public function create(BaseEntity $entity);

	abstract public function update(BaseEntity $entity);

	abstract public function delete(BaseEntity $entity);

	abstract public function retrieve($id);

	abstract public function retrieveAll();


}