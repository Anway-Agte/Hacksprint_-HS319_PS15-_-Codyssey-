<? 
   include("../functions.php") ; 
   include("displays.php") ;
   global $link ; 
  
   
  if($_GET['action'] == 'show'){
    $query = "SELECT * FROM Tasks WHERE `id` = '".$_POST['id_task']."'" ; 
     $result = mysqli_query($link , $query) ; 
      $row = mysqli_fetch_assoc($result) ;
      $html = "Project : ".$row['project']."<br>Description : ".$row['description']."<br>Deadline : ".$row['deadline']."" ;
      echo $html ; 
}

 if($_GET['action'] == 'change'){
     
 
   
     
     $query = "UPDATE Tasks SET `status` = 'In Progress' WHERE `id` = '". $_POST['task_id']."'" ;
     
     if(mysqli_query($link , $query)){
         
     }else{
        
     }
 }


  if($_GET['action'] == 'request'){
     
    $query = "UPDATE Tasks SET `status` = 'Request Change' WHERE `id` = '". $_POST['task_id']."'" ;
     
     if(mysqli_query($link , $query)){
         
     }else{
          
     }  }
      
     if($_GET['action'] == 'completed'){
     
     $query = "UPDATE Tasks SET `status` = 'Completed' WHERE `id` = '". $_POST['taskd']."'" ;
     
     if(mysqli_query($link , $query)){
         echo "completed" ; 
     }else{
          
     }  
     }
     
    

  if($_GET['action'] == 'changetitle'){
     
 
   
     
     $query =  "SELECT * FROM Tasks WHERE `id` = '".$_POST['taskid']."'" ; 
     $result =  mysqli_query($link , $query);
     $row = mysqli_fetch_assoc($result);
     echo json_encode($row);
     
    
 }


?>