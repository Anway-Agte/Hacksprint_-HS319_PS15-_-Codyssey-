


 
    
var resource = "" ; 
//Better to construct options first and then pass it as a parameter



 $(document).on("click","ul.noleader li",function(){
    resource = $(this).text()  ; 
}) ;   

$(".addleader").click(function(){
    var leader = $(".assignresource").find(":selected").text();
    $.ajax({
        type:"POST" ,
        url:"mfunctions.php?action=add",
        data:{lead:$(".assignresource").find(":selected").text() , res:resource},
        success:function(result){
           $(".noleader").html(result) ;
        }
    }) ;
     
}) ;

$(".add_project").click(function(){
    
  
    
    $.ajax({
        type:"POST" ,
         url:"mfunctions.php?add=project", 
        data:{a_assign:$(".selected_leader").val() ,project:$(".project_name").val(),
             deadline:$(".deadline").val() , description:$(".p_description").val()} ,
        success:function(f){
            
            alert(f)
        }
    }) ;
    
}) ;