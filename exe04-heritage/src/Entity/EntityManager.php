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
    static public function generate(\Faker\Factory $faker, $nbre=1) {
        
    }
    public function insertData(\ISL\Entity\Adresse $data){
        $conn = $this->getConnection();
        try{
            $conn->beginTransation();
            //Requête preparée
            $sql="INSERT INTO adresse(adressse_id, rue, numero, localite, codePostal, pays)VALUES";
            
            
            if($data.length === 1){
                $sql .="(:adresse_id ,:rue, :numero, :localite, :codePostal, :pays)";
                $requetePrepare= $conn->prepare($sql);
                $requetePrepare->execute([
                    ":adresse_id"=>$conn->lastInsertId(),
                    ":rue"=>$data->getRue(),
                    ":numero"=>$data->getNumero(),
                    ":localite"=>$data->getLocalite(),
                    ":codePostal"=>$data->getCodePostal(),
                    ":pays"=>$data->getPays()
                ]);
            }else{
                $nb_ajout=0;
                foreach($data as $adresse_id => $value){
                    $sql.="(:adresse_id".$adresse_id.", :rue".$adresse_id.", :numero".$adresse_id.", :localite".$adresse_id.", :codePostal".$adresse_id.", :pays".$adresse_id.")";
                    
                    //Table d'insertion de donnée dont les clés correspondent aux placeholders des requêtes preparées
                    $insertParametre[":adresse_id".$adresse_id] = $adresse_id;
                    $insertParametre[":rue".$adresse_id] = $value["rue"];
                    $insertParametre[":numero".$adresse_id] = $value["numero"];
                    $insertParametre[":localite".$adresse_id] = $value["localite"];
                    $insertParametre[":codePostal".$adresse_id] = $value["codePostal"];
                    $insertParametre[":pays".$adresse_id] = $value["pays"];
                    ++$nb_ajout;
                }
                
                //Insertion multiple dans la base de donnée de la commande
                $requetePrepare= $conn->prepare($sql);
                $requetePrepare->execute($insertParametre);
            }
            //Définir les changements par transaction comme permanente dans la DB
            $conn->commit();
            
        }catch(PDOException $e){
            //Si échec, annulation des changements par transactions 
            
            $conn->rollback();
            throw $e;
            
        }
        
        
        
    }


}

