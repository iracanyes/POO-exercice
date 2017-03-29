<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\POO\exe2\Adresse;

class Adresse {
    private $rue;
    private $numero;
    private $localite;
    private $codePostal;
    private $pays;
    
    public function getRue() {
        return $this->rue;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getLocalite() {
        return $this->localite;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setRue($rue) {
        $this->rue = $rue;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setLocalite($localite) {
        $this->localite = $localite;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function __toString() {
        return $this->getRue().", ".$this->getNumero().". ".$this->getCodePostal()." ".$this->getLocalite().", ".$this->getPays();
    }
    
}
