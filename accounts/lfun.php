

 <?
   include("../functions.php") ; 
   include("displays.php") ;
   echo "LFUN OP" ;
  global $link ; 
  if($_GET['action'] == 'projectClick'){
      echo "done" ;
         
  }
  if($_GET['action']=='taskCreate'){
      
      
      if($_POST['project'] == ''){  
          echo "Please select a project" ;
      }
      else{
          $query = "SELECT * FROM `Resource` WHERE `name` = '".$_POST['res']."'" ;
        $result = mysqli_query($link , $query) ;
          $row = mysqli_fetch_assoc($result) ;
          $resid =  $row['id'] ;
          echo $resid ; 
          $query = "INSERT INTO Tasks (`task`,`project`,`resource_id`,`leader_id`,`description`,`deadline`,`status`) VALUES ('".
        .mysqli_real_escape_string($link , $_POST['task'])."' , '".mysqli_real_escape_string($link , $_POST['project'])."' , '".mysqli_real_escape_string($link ,$resid)."' , '".mysqli_real_escape_string($link , $_SESSION['id'])."' , '".mysqli_real_escape_string($link , $_POST['descrip'])."' , '".mysqli_real_escape_string($link , $_POST['ded'])."' , '".mysqli_real_escape_string($link , 'Assigned')."')" ; 
          if(mysqli_query($link , $query)){
              
              echo " WHOOSh" ; 
          }else{
              echo mysqli_error($link) ;
          }
          
      }
  }

?> 

