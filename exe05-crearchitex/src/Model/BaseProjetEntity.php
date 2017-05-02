<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\MvcExample\Model;

interface BaseProjetEntity{
    /**
     * @return mixed
     */
    public function getProjet_id();
    /**
     * @param mixed $id
     */
    public function setProjet_id($id);
}
