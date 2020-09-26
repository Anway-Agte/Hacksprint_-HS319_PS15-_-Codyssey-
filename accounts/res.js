var clickedTask = "" ;

 $(document).on("click",".res_tasks li" , function(){
    
    
    
   
     $.ajax({
         type:"POST" ,
         url:"rfunctions.php?action=show" ,
         data:{id_task : $(this).attr("name")},
         success:function(res){
             $(".para").html(res) ;
         }
     })
        
   
}) ; 

$(document).on("click",".changebutton",function(){
    
     
     $.ajax({
        
        type:"POST" ,
        url:"rfunctions.php?action=changetitle" ,
        data:{taskid:$(this).attr("name")},
        success:function(res){
            var duce = jQuery.parseJSON(res);
            $(".change-request-title").html(duce.task) ;
            $(".req_change").attr("name" , duce.id) ; 
        }
    })
  
}) ; 

$(document).on("click",".inprogress",function(){

    $.ajax({
        
        type:"POST" ,
        url:"rfunctions.php?action=change" ,
        data:{task_id:$(this).attr("name")},
        success:function(res){
            
        }
    })
  
}) ;

$(document).on("click",".req_change",function(){
    
   $.ajax({
        
        type:"POST" ,
        url:"rfunctions.php?action=request" ,
        data:{task_id:$(this).attr("name")},
        success:function(res){
            
        }
    })
});


$(".submitbutton").click(function(){
 
  $(".task_complete").attr("name" , $(this).attr("name")) ; 
}) ;

 $(".task_complete").click(function(){
                           
                           
    $.ajax({
        
        type:"POST" ,
        url:"rfunctions.php?action=completed" ,
        data:{taskd:$(this).attr("name")},
        success:function(res){
            alert(res) ; 
        }
    })
                           }) ;

$(".category a").click(function(){
       $.ajax({
        
        type:"POST" ,
        url:"displays.php?action=modres" ,
        data:{val:$(this).text()},
        success:function(res){
            $(".res_tasks").html(res) ; 
        }
    })
});
$(".res_tasks li").click(function(){
    
    
    
   
     $.ajax({
         type:"POST" ,
         url:"rfunctions.php?action=show" ,
         data:{id_task : $(this).attr("name")},
         success:function(res){
             $(".para").html(res) ;
         }
     })
        
   
}) ;