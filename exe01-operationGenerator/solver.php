<?php

/* 
 * Class Générateur d'opérations
 */

class OperationSolver{
    
    private $resolu= [
        
    ];
    
    public function setOperations($param){
        
        $this->resolu[]=$param;
    }
    
    public function getOperations(){
        return $this->resolu;
    }
    
    static public function solve($data){
        $table_result = [];
        foreach ($data as $key => $value) {
            echo "<br />Donnée recu: ".$value."<br />";
            //Subdivision d'une chaine selon le séparateur espace
            $table = preg_split("[\s]",$value,3);
            //print_r($table);
            //Assignation multiple des données de la table
            list($x,$operateur,$y)= $table;
            
            $x = (float) $x;
            $y =(float) $y;
            
            switch($operateur){
                case "+":
                    $result = $x + $y;
                    break;
                case "-":
                    $result = $x - $y;
                    break;
                case "*":
                    $result = $x * $y;
                    break;
                case "/":
                    $result = $x / $y;
                    break;
                
            }
            $ligne= $x." ".$operateur." ".$y." = ".$result;
            
            test : echo "<br />Opération réalisé:<br />".$ligne."<br />";
            $table_result[]=$ligne;
            
        }
        print_r($table_result);
        
        return $table_result;
                
            
            
            
            
            
            
        
    }
}

