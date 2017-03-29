<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ISL\Manager;

use ISL\Entity\Personne;

class PersonneManager{
    private $faker;
    private $personnes;
    
    function __construct($faker){
        $this->faker=$faker;
    }
    public function getPersonnes() {
        return $this->personnes;
    }

    public function setPersonnes($personnes) {
        $this->personnes = $personnes;
    }

    
    public function setFaker($faker){
        $this->faker = $faker;
    }
    public function getFaker(){
        return $this->faker;
    }
    static public function generate(\Faker\Generator $faker,$nbr=1){
        $personnes=[];
        
        for($i =0; $i <=$nbr; $i++){
            $p= new Personne();
            $p->setPrenom($faker->lastName);
            $p->setNom($faker->firstname);
            $p->setAdresse($faker->address);
            $p->setCodePostal($faker->postcode);
            $p->setPays($faker->country);
            $p->setSociete($faker->company." ".$faker->companySuffix);
            $personnes[]=$p;        
        }
        //$this->personnes=$personnes;
        return $personnes;
    }
            
}
