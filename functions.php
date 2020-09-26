<?  
    session_start() ;
    $link  = mysqli_connect("shareddb-w.hosting.stackcp.net" , "Taskit-3134393a02" , "*{@CIrQbE(I$" ,"Taskit-3134393a02") ; 
    if(mysqli_connect_errno()){
        print_r(mysqli_connect_error()) ; 
    }
 if($_GET['function'] == 'logout'){
     session_unset() ;
 }
 
?>