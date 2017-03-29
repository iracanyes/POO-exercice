<?php

/* 
 * Class Générateur d'opérations
 */
class OperationSolver{
    private $resolu= [
        
    ];
    
    private function setOperations($param) {
        $this->resolu[]=$param;
    }
    
    public function getOperation(){
        return $this->operations;
    }
    
    static public function solve($data){
        $data_result = [];
        foreach ($data as $value) {
            
            //Subdivision d'une chaine selon le séparateur espace
            $table = preg_split("[\s]",$value,5);
            
            //Assignation multiple des données de la table
            list($x,$operateur,$y,$egal,$reponse)= $table;
            
            $x = (int) $x;
            $y =(int) $y;
            
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
            $operation= $x." ".$operateur." ".$y." = ".$result;
            
            echo "<br />Opération réalisé:<br />".$operation."<br />";
            echo "Pas de problème <br />";
            
            echo "Pas de problème <br />";
            $this->setOperations($operation);
            echo "Pas de problème <br />";
            
        }
    }
}

