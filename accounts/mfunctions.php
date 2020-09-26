<? include("../functions.php") ; 
   include("displays.php") ;
 global $link ; 


 if($_GET['action'] == 'add'){ 
     $query = "UPDATE Resource SET `leader` = '".$_POST['lead']."' WHERE `name` = '".$_POST['res']."'" ;
     if(mysqli_query($link , $query)){
         
         echo displayResource() ;
     }
     else{
         "Shoot there was some problem  " ;
     }
 } 

if($_GET['add'] == 'project'){
   $query = "SELECT * FROM Leader WHERE `name` = '".$_POST['a_assign']."'" ; 
   $result = mysqli_query($link , $query) ;
   $row = mysqli_fetch_assoc($result) ; 
   $id = $row['id'] ; 

   $query2 = "INSERT INTO Project (`project` , `leader_id` ,`description`,`deadline`,`no_of_tasks`) VALUES ( '".mysqli_real_escape_string($link , $_POST['project'])."' , '".mysqli_real_escape_string($link , $id)." ' , '".mysqli_real_escape_string($link , $_POST['description'])." ' , '".mysqli_real_escape_string($link , $_POST['deadline'])." ' , '0')" ; 
    
    if(mysqli_query($link , $query2)){
        
        echo "Your leader will be informed !" ; 
    }
    else{
        echo mysqli_error($link) ;  
    }
    
   
}

if($_GET['action'] == 'chart'){
 
    
     $query = "SELECT * FROM Project" ; 
    
     $result = mysqli_query($link , $query) ; 
    
     $bar = array();
     
     while($row = mysqli_fetch_assoc($result)){
         $name = $row['project'] ; 
         $query = "SELECT * FROM Tasks WHERE `project` = '".$name."' AND `status` = 'Completed' " ; 
         $bar[$name] = mysqli_num_rows(mysqli_query($link , $query)) ; 
         
     } 
    echo json_encode($bar);
}

?> 