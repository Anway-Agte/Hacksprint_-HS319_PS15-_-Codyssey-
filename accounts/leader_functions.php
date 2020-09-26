<?
include("../functions.php") ; 
   include("displays.php") ;

 

  
 global $link ; 
  if(array_key_exists("action",$_GET) && $_GET["action"] == "projectClick"){
      $project = $_POST['selected_project'] ; 
      $query = "SELECT * FROM Tasks WHERE `project` = '".$project."'" ;  
      $result = mysqli_query($link , $query) ; 
      if(mysqli_num_rows($result)>0){
          $html = "" ; 
          while($row = mysqli_fetch_assoc($result)){
              $html.='<li class="list-group-item t" name = "'.$row['id'].'">'.$row['task'].' <button class="list-button delbut"   data-toggle="modal" data-id = "'.$row['id'].'" data-target="#delete" name = "'.$row['id'].'"
                  style="background-color:transparent; border: none;"><span title="Delete Task" class="fas fa-trash "
                    style="font-size: 1em;"></span></button>

                <!--button 2-->
                <button data-toggle="modal" data-id = "'.$row['id'].'" data-target="#change" name = "'.$row['id'].'" class="list-button edit_button"
                  style="background-color:transparent; border: none;"><span title="Modify task" class="fas fa-edit"
                    style="font-size: 1em;"></span></button>
              </li>' ; 
          }
          echo $html ; 
      }
  }


 if(array_key_exists("task",$_GET) && $_GET['task']='taskCreate'){
     
      
     
      if($_POST['project'] == ''){
          echo "Please select a project" ; 
      }else if($_POST['task'] == '') {
          echo "Please enter task name" ; 
          
      }
     else{
          
           $query = "SELECT * FROM `Resource` WHERE `name` = '".$_POST['res']."'" ;
            $result = mysqli_query($link , $query) ;
              $row = mysqli_fetch_assoc($result) ;
              $resid = $row['id'] ;
          
            $query = "INSERT INTO `Tasks` (`task` , `project` , `resource_id` ,`leader_id` , `description` , `deadline` , `status`) VALUES ('".
                mysqli_real_escape_string($link , $_POST['task'])."' , '".mysqli_real_escape_string($link , $_POST['project'])."' , '".mysqli_real_escape_string($link , $resid)."' , '".mysqli_real_escape_string($link , $_SESSION['id'])."' , '".mysqli_real_escape_string($link , $_POST['descrip'])."' , '".mysqli_real_escape_string($link , $_POST['dedline'])."' , '".mysqli_real_escape_string($link , "assigned")."')" ; 
          
           if(mysqli_query($link,$query)){
               
               echo "Successfully created the task" ; 
           }else{
               echo "There was some problem , Please try again later !" ; 
           }
           
      }
      

         
     
     
 }
 
  if($_GET['action']=='dismissreq'){
      $query = "UPDATE Tasks SET `status` = 'assigned' WHERE `id` = '".$_POST['reqid']."'" ; 
      if(mysqli_query($link , $query)){
          echo "The request has been declined" ; 
      } else{
          echo " There was some problem , please try again later ." ; 
      }
    
      
  } 
 if($_GET['action']=='rereq'){
   
     $query = "SELECT * FROM Resource WHERE `name` = '".$_POST['resname']."'" ; 
     $result = mysqli_query($link , $query) ; 
     $row = mysqli_fetch_assoc($result) ; 
     $query  = "UPDATE Tasks SET `resource_id` = '".$row['id']."'  WHERE `id` =  '".$_POST['changeid']."'"  ;
    $query  = "UPDATE Tasks SET `status` = 'assigned' WHERE `id` =  '".$_POST['changeid']."'"  ;
     if(mysqli_query($link , $query)){
         echo "Reassigned succesfully" ; 
     }else{
         echo " There was some problem , please try again later ." ;
     }
    
      
  } 

if($_GET['action'] == 'modify'){
    $query = "SELECT * FROM Tasks WHERE `id` = '".$_POST['modtaskid']."'" ; 
    $result = mysqli_query($link , $query) ; 
     $row = mysqli_fetch_assoc($result) ;
     if($_POST['newres'] != ""){
         $query = "SELECT * FROM `Resource` WHERE `name` = '".$_POST['newres']."'" ;
            $result = mysqli_query($link , $query) ;
              $row = mysqli_fetch_assoc($result) ;
              $resid = $row['id'] ;
         $query = "UPDATE Tasks SET `resource_id` = '".$resid."'WHERE `id` = '".$_POST['modtaskid']."'" ;
        mysqli_query($link , $query) ; 
     }
    if($_POST['newname'] != ""){
        $query = "UPDATE Tasks SET `task` = '".$_POST['newname']."'WHERE `id` = '".$_POST['modtaskid']."'" ;
       mysqli_query($link , $query) ;
    }if($_POST['newded'] != ""){
        $query = "UPDATE Tasks SET `deadline` = '".$_POST['newded']."'WHERE `id` = '".$_POST['modtaskid']."'" ;
        mysqli_query($link , $query) ;
    }if($_POST['newdes'] != ""){
        $query = "UPDATE Tasks SET `description` = '".$_POST['newdes']."'WHERE `id` = '".$_POST['modtaskid']."'" ;
        mysqli_query($link , $query) ;
    }
}

if($_GET['action'] == 'delete'){
    
    $query = "DELETE FROM Tasks WHERE `id` = '".$_POST['delid']."'" ; 
    if(mysqli_query($link , $query)){
        echo "Successful Deletion" ; 
    }else{
        
        echo mysqli_error() ; 
    }
}
?>
