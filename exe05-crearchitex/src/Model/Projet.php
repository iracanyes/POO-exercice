<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\MvcExample\Model;

class Projet implements BaseProjetEntity{
    private $projet_id;
    
    private $titre;
    private $sous_titre;
    private $description;
    private $date_add;
    private $admin_id;
    private $is_visible;
    
    public function __construct($data) {
        //Paramètrage de l'objet à son instanciation
        foreach($data as $key=>$value){
            if(method_exists($this, 'set'.  strtoupper($key))){
                $this->{"set".$key}($value);
            }
        }
    }
    public function getProjet_id() {
        return $this->projet_id;
    }
    
    public function setProjet_id($param) {
        $this->projet_id=$param;
    }
    public function getTitre() {
        return $this->titre;
    }

    public function getSous_titre() {
        return $this->sous_titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate_add() {
        return $this->date_add;
    }

    public function getAdmin_id() {
        return $this->admin_id;
    }

    public function getIs_visible() {
        return $this->is_visible;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setSous_titre($sous_titre) {
        $this->sous_titre = $sous_titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDate_add($date_add) {
        $this->date_add = $date_add;
    }

    public function setAdmin_id($admin_id) {
        $this->admin_id = $admin_id;
    }

    public function setIs_visible($is_visible) {
        $this->is_visible = $is_visible;
    }


    
}
