<?
   include("functions.php") ;
    $user = "" ;
    $error = "" ; 
    $r = "Resource" ;
    $m = "Manager" ; 
    $l = "Leader" ;  
     if($_GET['action'] == 'login'){
        
        $user = $_POST['luser'] ; 
         
        
            $query = "SELECT * FROM ".$user." WHERE email = '".mysqli_real_escape_string($link , $_POST['l_email'])."'" ; 
            $result = mysqli_query($link , $query) ;
            $row = mysqli_fetch_assoc($result) ; 
            if($row['password'] == md5(md5($row['id'].$_POST['l_password']))){
                $_SESSION['id'] = $row['id'] ; 
                $_SESSION['user'] = $user ; 
                echo json_encode($_SESSION) ;
            }else{
                echo "Please check your email/password" ;
            }
            
            
        
         
 
     }
?>