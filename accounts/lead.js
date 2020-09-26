var clickedProject = "" ; 
 $(document).on("click", ".projects li",function(){
    
    clickedProject = $(this).html() ; 
  $(this).addClass('active') ;
    $(this).siblings().removeClass('active') ;
    
    $.ajax({
        
       type:"POST" , 
       url:"leader_functions.php?action=projectClick",
        data:{selected_project:clickedProject},
        success:function(result){
           $(".list_tasks").html(result) ;
        }
        
        
    });
}) ; 


$(".create_task").click(function(){
    
   
    $.ajax({
        
        type:"POST",
        url:"leader_functions.php?task=taskCreate",
    data :            {project:clickedProject,task:$(".create_task_name").val(),descrip:$(".create_description").val(),res:$(".create_resource").find(":selected").text() ,dedline:$(".create_deadline").val()} ,
        success:function(e){
            alert(e) ;
        }
    }) ;
    
}) ;

$(".decline").click(function(){
    $(".req_dismiss").attr("name" , $(this).attr("name")) ; 
}) ; 
$(".reassign").click(function(){
    
    $(".re_button").attr("name" , $(this).attr("name")) ; 
}) ;
$(".req_dismiss").click(function(){
    
    $.ajax({
        
        type:"POST" , 
        url:"leader_functions.php?action=dismissreq" ,
        data:{reqid:$(this).attr("name")},
        success:function(res){
            alert(res) ; 
        }
        
    });
}) ;
  $(".re_button").click(function(){
       $.ajax({
        
        type:"POST" , 
        url:"leader_functions.php?action=rereq" ,
        data:{changeid:$(this).attr("name") , resname :$(".reassignresource").find(":selected").text()},
        success:function(res){
            alert(res) ;
            
        }
       
  }) ; 
  }) ; 
 $(document).on("click", ".delbut", function(){
         $(".delbutton").attr("name",($(this).attr("name"))) ; 
        });
      
 $(document).on("click", ".edit_button", function(){
         $(".modify").attr("name",($(this).attr("name"))) ; 
        });
      
$(".modify").click(function(){
    $.ajax({
        
        type:"POST" , 
        url:"leader_functions.php?action=modify" ,
        data:{modtaskid:$(this).attr("name"),newname:$(".newtask").val(),newdes:$(".newdescrip").val(),newres:$(".new_res").find(":selected").text(),newded:$(".new_deadline").val()} ,
        success:function(res){
            alert(res) ;
            
        }
       
  }) ; 
}) ; 
$(".delbutton").click(function(){
    $.ajax({
        
        type:"POST" , 
        url:"leader_functions.php?action=delete" ,
        data:{delid:$(this).attr("name")},
        success:function(res){
            alert(res) ;
            
        }
}) ; }) ; 

function getRealData(){
    
    $.ajax({
        type:"POST",
        url:"real.php" ,
        data:{data:"leadertable"} ,
        success:function(result){
            alert("OP") ;
        } 
    }) ; 
} ; 


$('document').ready(function () {
 setInterval(function () {getRealData()}, 1000);//request every x seconds

 }); 



