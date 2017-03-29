<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonneManager
 *
 * @author isk
 */

namespace ISL\Manager;
use Faker\Factory;
use Faker\Provider\fr_BE\Person;
use Faker\Provider\fr_BE\Address;
use ISL\Entity\Personne;
class PersonneManager {
    
    public $personnes = [];
    static public function create($nombre) {
        
        for($i=0;$i<$nombre;$i++){
            $faker = Factory::create("fr_BE");
            //print_r($faker);
            ${"person".$i}= new Personne();
            
            
            ${"person".$i}->setNom($faker->firstName);
            
            ${"person".$i}->setPrenom($faker->lastName);
            ${"person".$i}->setAdresse($faker->streetAddress);
            ${"person".$i}->setVille($faker->city);
            ${"person".$i}->setCodePostal($faker->postcode);
            ${"person".$i}->setPays($faker->country);
            //le faker "bs" ne fonctionne pas
            ${"person".$i}->setSociete($faker->company);
            ${"person".$i}->__toString();
            $personnes[]=${"person".$i};
            
            //Découpage adresse
        }
        return $personnes;
    }
}
