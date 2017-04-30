/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(":radio[name='crud']").change(function(){
    var value=$(this).val();
    console.log(value);
    
    
    switch(value){
        case "create":
            $("fieldset").css("display","none");
        break;
        case "read":
            $("fieldset").css("display","block");
            
            $("fieldset label").css("display","none");
            $("label.identifiant").css("display","block");
            
        break;
        case "update":
            $("form:eq(1) fieldset, label,input").fadeIn(1000);
            $(":input[name='groupe']").change(function(){
                console.log($(this).val());
                if($(this).val() === "enseignant"){
                    $("fieldset#etudiantField").fadeOut(1000);
                    $("fieldset#enseignantField").removeAttr("hidden").slideDown(1000);
                }
                if($(this).val() === "etudiant"){
                    $("fieldset#etudiantField").fadeIn(1000);
                    $("fieldset#enseignantField").slideUp(1000);
                }
                
            });
            
            
            
        break;
        case "delete":
            
            $("fieldset").css("display","block");
            
            $("label").css("display","none");
            $("label.identifiant").css("display","block");
        break;
        
    
        
    }
    
});
