<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\Entity;

class Enseignant extends Personne{
    private $coursDonnes;
    private $dateEntreeService;
    private $anciennete;
    
    public function getCoursDonnes() {
        return $this->coursDonnes;
    }

    public function getDateEntreeService() {
        return $this->dateEntreeService;
    }

    public function getAnciennete() {
        return $this->anciennete;
    }

    public function setCoursDonnes(array $coursDonnes) {
        $this->coursDonnes = $coursDonnes;
    }

    public function setDateEntreeService(\DateTime $dateEntreeService) {
        $this->dateEntreeService = $dateEntreeService;
    }

    public function setAnciennete(int $anciennete) {
        $this->anciennete = $anciennete;
    }

    public function __toString() {
        $format="%s %s \n %s %s \n %s \n %s \n %s \n %s \n %s";
        $nom=  $this->getNom();
        $prenom=  $this->getPrenom();
        $adresse=  $this->getAdresse();
        $cp= $this->getCodePostal();
        $pays=  $this->getPays();
        $societe=  $this->getSociete();
        $coursDonnee=  $this->getCoursSuivis();
        $dateEntreeService=  $this->getNiveau();
        $anciennete=  $this->getDateInscription();
        
        return sprintf($format, $nom, $prenom, $adresse, $cp, $pays, $societe, $coursDonnee, $dateEntreeService, $anciennete);
    }

}
