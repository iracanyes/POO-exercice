<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function tableEnseignant(Enseignant $data){
    
    echo '<table id="tableEnseignant">'
            . '<caption>Table des enseignants</caption>'
            . '<thead>'
                . '<th>Personne ID</th>'
                . '<th>Nom</th>'
                . '<th>Prénom</th>'
                . '<th>Adresse</th>'
                . '<th>Code postal</th>'
                . '<th>Pays</th>'
                . '<th>Societe</th>'
                . '<th>Enseignant ID</th>'
                . '<th>Cours données</th>'
                . '<th>Date entrée service</th>'
                . '<th>Ancienneté</th>'
            . '</thead>';
    
    if(count($data)>1){
        echo "<tbody>";
        foreach ($data as $key => $value) {
            $personneId=$value["personne_id"];
            $nom=$value["nom"];
            $prenom=$value['prenom'];
            $adresse=$value["adresse"];
            $codePostal=$value['codePostal'];
            $pays=$value["pays"];
            $societe=$value['societe'];
            $enseignantId=$value["enseignant_id"];
            $coursDonnee=$value["cours_donnee"];
            $dateEntreeService=$value["date_entree_service"];
            $anciennete=$value["anciennete"];
            
            
            echo  '<td>'.$nom.'</td>'
                . '<td>'.$prenom.'</td>'
                . '<td>'.$adresse.'</td>'
                . '<td>'.$codePostal.'</td>'
                . '<td>'.$pays.'</td>'
                . '<td>'.$societe.'</td>'
                . '<td>'.$enseignantId.'</td>'
                . '<td>'.$coursDonnee.'</td>'
                . '<td>'.$dateEntreeService.'</td>'
                . '<td>'.$anciennete.'</td>';
            
        }
        echo "</tbody>";
    }else{
        $personneId=$data["personne_id"];
        $nom=$data["nom"];
        $prenom=$data['prenom'];
        $adresse=$data["adresse"];
        $codePostal=$data['codePostal'];
        $pays=$data["pays"];
        $societe=$data['societe'];
        $enseignantId=$data["enseignant_id"];
        $coursDonnee=$data["cours_donnee"];
        $dateEntreeService=$data["date_entree_service"];
        $anciennete=$data["anciennete"]; 
        
        echo    '<tbody>'
                . '<td>'.$nom.'</td>'
                . '<td>'.$prenom.'</td>'
                . '<td>'.$adresse.'</td>'
                . '<td>'.$codePostal.'</td>'
                . '<td>'.$pays.'</td>'
                . '<td>'.$societe.'</td>'
                . '<td>'.$enseignantId.'</td>'
                . '<td>'.$coursDonnee.'</td>'
                . '<td>'.$dateEntreeService.'</td>'
                . '<td>'.$anciennete.'</td>'
            . '</tbody>';
            
            
    }
    
    echo '</table>';
    
    
        
            
    
}


function tableEtudiant(Etudiant $data){
    
    echo '<table id="tableEtudiant">'
            . '<caption>Table des étudiants</caption>'
            . '<thead>'
                . '<th>Personne ID</th>'
                . '<th>Nom</th>'
                . '<th>Prénom</th>'
                . '<th>Adresse</th>'
                . '<th>Code postal</th>'
                . '<th>Pays</th>'
                . '<th>Societe</th>'
                . '<th>Etudiant ID</th>'
                . '<th>Cours suivis</th>'
                . '<th>Niveau</th>'
                . '<th>Date inscription</th>'
            . '</thead>';
    
    if(count($data)>1){
        echo "<tbody>";
        foreach ($data as $key => $value) {
            $personneId=$value["personne_id"];
            $nom=$value["nom"];
            $prenom=$value['prenom'];
            $adresse=$value["adresse"];
            $codePostal=$value['codePostal'];
            $pays=$value["pays"];
            $societe=$value['societe'];
            $etudiantId=$value["etudiant_id"];
            $coursSuivi=$value["cours_suivi"];
            $niveau=$value["niveau"];
            $dateInscription=$value["date_inscription"];
            
            
            echo  '<td>'.$personneId.'</td>'
                . '<td>'.$nom.'</td>'
                . '<td>'.$prenom.'</td>'
                . '<td>'.$adresse.'</td>'
                . '<td>'.$codePostal.'</td>'
                . '<td>'.$pays.'</td>'
                . '<td>'.$societe.'</td>'
                . '<td>'.$etudiantId.'</td>'    
                . '<td>'.$coursSuivi.'</td>'
                . '<td>'.$niveau.'</td>'
                . '<td>'.$dateInscription.'</td>';
            
        }
        echo "</tbody>";
    }else{
        $personneId=$data["personne_id"];
        $nom=$data["nom"];
        $prenom=$data['prenom'];
        $adresse=$data["adresse"];
        $codePostal=$data['codePostal'];
        $pays=$data["pays"];
        $societe=$data['societe'];
        $etudiantId=$data["etudiant_id"];
        $coursSuivi=$data["cours_suivi"];
        $niveau=$data["niveau"];
        $dateInscription=$data["date_inscription"]; 
        
        echo    '<tbody>'
                . '<td>'.$nom.'</td>'
                . '<td>'.$prenom.'</td>'
                . '<td>'.$adresse.'</td>'
                . '<td>'.$codePostal.'</td>'
                . '<td>'.$pays.'</td>'
                . '<td>'.$societe.'</td>'
                . '<td>'.$etudiantId.'</td>'    
                . '<td>'.$coursSuivi.'</td>'
                . '<td>'.$niveau.'</td>'
                . '<td>'.$dateInscription.'</td>'
            . '</tbody>';
            
            
    }
    
    echo '</table>';
    
    
        
            
    
}