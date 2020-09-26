<? 
    include("functions.php") ;

    $user = "" ;
    $error = "" ; 
    $r = "Resource" ;
    $m = "Manager" ; 
    $l = "Leader" ; 

 if($_GET['action'] == 'signup'){
     
     $user = $_POST['user'] ;
        
     
     
     if(!empty($_POST['email']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['password'])){
          $name = $_POST['fname']." ".$_POST['lname'] ; 
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                 $error = "Invalid email format";
          }
        
            else{
                 
                if($user == $r) {
            $query = "SELECT * FROM `Resource` WHERE `email` = '".mysqli_real_escape_string($link , $_POST['email'])."'" ; 
            $result = mysqli_query($link , $query) ;
                 }
            else if($user == $m) {
            $query = "SELECT * FROM `Manager` WHERE `email` = '".mysqli_real_escape_string($link , $_POST['email'])."'" ; 
            $result = mysqli_query($link , $query) ;
            }
                else if($user == $l) {
            $query = "SELECT * FROM `Leader` WHERE `email` = '".mysqli_real_escape_string($link , $_POST['email'])."'" ; 
                    
            $result = mysqli_query($link , $query) ;
                }
                
            if(mysqli_num_rows($result)>0){
               $error = "This email address is already taken" ; 
            }else{
                if($user == $r){
                $query = "INSERT INTO `Resource`  (`name` , `email` , `password` ,`leader`) VALUES ('".mysqli_real_escape_string($link , $name)."' , '".mysqli_real_escape_string($link , $_POST['email'])."','".mysqli_real_escape_string($link , $_POST['password'])."' , '".mysqli_real_escape_string($link ,  "")."' )" ;
                if(mysqli_query($link , $query)){
                    $query = "UPDATE `Resource` SET `password` = '".md5(md5(mysqli_insert_id($link).$_POST['password']))."' WHERE id = '".mysqli_insert_id($link)."'";
                    mysqli_query($link , $query ) ; 
                    $error =  "1" ; 
                }
                else{
                    $error = "There was some problem , please try again later " ; 
                }
                    }
                else if($user == $m){
                $query = "INSERT INTO `Manager`  (`name` , `email` , `password` ) VALUES ('".mysqli_real_escape_string($link , $name)."' , '".mysqli_real_escape_string($link , $_POST['email'])."','".mysqli_real_escape_string($link , $_POST['password'])."' )" ;
                if(mysqli_query($link , $query)){
                    $query = "UPDATE `Manager` SET `password` = '".md5(md5(mysqli_insert_id($link).$_POST['password']))."' WHERE id = '".mysqli_insert_id($link)."'";
                    mysqli_query($link , $query ) ; 
                    $error =  "1" ; 
                }
                else{
                    $error = "There was some problem , please try again later " ; 
                }
                    }
                else if($user == $l){
                $query = "INSERT INTO `Leader`  (`name` , `email` , `password` ) VALUES ('".mysqli_real_escape_string($link , $name)."' , '".mysqli_real_escape_string($link , $_POST['email'])."','".mysqli_real_escape_string($link , $_POST['password'])."')" ;
                if(mysqli_query($link , $query)){
                    
                    $query = "UPDATE `Leader` SET `password` = '".md5(md5(mysqli_insert_id($link).$_POST['password']))."' WHERE id = '".mysqli_insert_id($link)."'";
                    mysqli_query($link , $query ) ; 

                    $error =  "1" ; 
                }
                else{
                    $error = "There was some problem , please try again later " ; 
                }
                    }
               
            }
           
               echo $error ; 
            
               
            }
          
           } 
 } 
else  if($_GET['action'] == 'login'){
         print_r($_POST) ; 
     } ; 

           
  
        
         
      
         
      
      
     
     
  
    
  
?>