<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OperationsGenerator{
    
    private $operateur =[" + "," - ", " * "," / "];
    private $operations = [
        addition => [],
        soustraction => [],
        multiplication => [],
        division => []
    ];
    
    public function getOperations(){
        return $this->operations;
    }
    public function afficheOperations(){
        foreach ($this->operations as $key => $value) {
            echo "<br />La table de ".$key."<br /><br />";
            if(empty($value)){
                echo "<br />Aucune opération de ce type a été effectuée! <br />";
            }else{
                foreach ($value as $cle => $valeur) {
                    echo $value[$cle]."<br />";
                }
                echo "<br />";
            }
            
        }
    }
    private function ajouterAddition($ligne){
        $this->operations['addition'][]=$ligne;
    }
    private function ajouterSoustraction($ligne){
        $this->operations['soustraction'][]=$ligne;
    }
    private function ajouterMultiplication($ligne){
        $this->operations['multiplication'][]=$ligne;
    }
    private function ajouterDivision($ligne){
        $this->operations['division'][]=$ligne;
    }
    public function genererOperations($nombre) {
        for($i=0;$i<$nombre;$i++){
            $signe = mt_rand(0, 3);
            $x = mt_rand(1, 100);
            $y = mt_rand(1, 100);
            switch($signe){
                case 0:
                    $addition = $x + $y;
                    $operation= $x." + ".$y." = ".$addition;
                    /* sprintf("%d + %d = %d",$x,$y,$addition);
                     * 
   
    
    static public function solve($data){
        
        
            
            //Subdivision d'une chaine selon le séparateur espace
            $table = preg_split("[\s]",$data,3);
            
            //Assignation multiple des données de la table
            list($x,$operateur,$y,$egal,$reponse)= $table;
                              */
                    $this->ajouterAddition($operation);
                    
                    break;
                case 1:
                    $soustraction = $x - $y;
                    $operation= $x." - ".$y." = ".$soustraction;
                    $this->ajouterSoustraction($operation);
                    
                    break;
                case 2:
                    $multiplication = $x * $y;
                    $operation= $x." * ".$y." = ".$multiplication;
                    $this->ajouterMultiplication($operation);
                    
                    break;
                case 3:
                    $division = $x / $y;
                    $operation= $x." / ".$y." = ".$division;
                    $this->ajouterDivision($operation);
                    
                    break;
                
            }
            //Vérification
            echo $operation."<br />";
        }
    }
}