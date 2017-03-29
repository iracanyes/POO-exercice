<?php

/* 
 * Contenu: Créez une classe ISL\Entity\EntityManager qui comprendra les méthodes communes
à la gestion de toutes les entités
 * Date: 28/03/2017
 */
namespace ISL\Entity;

class EntityManager{
    private $etudiants;
    private $enseignants;
    
    public function getEtudiants() {
        return $this->etudiants;
    }

    public function getEnseignants() {
        return $this->enseignants;
    }

    public function setEtudiants($etudiants) {
        $this->etudiants = $etudiants;
    }

    public function setEnseignants($enseignants) {
        $this->enseignants = $enseignants;
    }


}

