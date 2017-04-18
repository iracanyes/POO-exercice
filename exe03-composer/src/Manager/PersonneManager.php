<?php

/*
 * Contenu : .
 */

/**
 * Description of PersonneManager
 *
 * @author isk
 */

namespace ISL\Manager;

use Faker\Factory;

use ISL\Entity\Personne;

class PersonneManager {
    private $dsn="mysql:host=localhost;dbname=isl_POO_test";
    private $user="isl_iracanyes";
    private $password="";
    private $connection;
    private $personnes=[];
    
    public function getDsn() {
        return $this->dsn;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getConnection() {
        return $this->connection;
    }
    
    
    public function getPersonnes() {
        return $this->personnes;
    }
    
    public function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setConnection($connection) {
        $this->connection = $connection;
    }
    
    public function setPersonnes($personne) {
        
        $this->personnes=$personne;
        
    }
        
    static public function create(int $nombre) {
        $data=[];
        for($i=0;$i<$nombre;$i++){
            $faker = Factory::create("fr_BE");
            
            $person="person".$i;
            $$person= new Personne();
            
            
            $$person->setNom($faker->lastName);
            
            $$person->setPrenom($faker->firstName);
            $$person->setAdresse($faker->streetAddress);
            $$person->setVille($faker->city);
            $$person->setCodePostal($faker->postcode);
            $$person->setPays($faker->country);
            //le faker "bs" ne fonctionne pas
            $$person->setSociete($faker->company);
            //$$person->__toString();
            $data[$person]=$$person;
            
            //Découpage adresse
        }
        //self::setPersonnes($data);
        return $data;
    }
    
}
