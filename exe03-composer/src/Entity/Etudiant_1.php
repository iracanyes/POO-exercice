<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\Entity;
class Etudiant extends Personne{
    private $coursSuivis;
    private $niveau;
    private $dateInscription;
    public function getCoursSuivis() {
        return $this->coursSuivis;
    }

    public function getNiveau() {
        return $this->niveau;
    }

    public function getDateInscription() {
        return $this->dateInscription;
    }

    public function setCoursSuivis(array $coursSuivis) {
        $this->coursSuivis = $coursSuivis;
    }

    public function setNiveau(string $niveau) {
        $this->niveau = $niveau;
    }

    public function setDateInscription(\DateTime $dateInscription) {
        $this->dateInscription = $dateInscription;
    }


}
