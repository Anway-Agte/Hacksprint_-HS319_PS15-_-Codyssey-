<?  
  include("../functions.php") ; 
  include("displays.php") ; 
  if(isset($_SESSION['id'])){
      
      if($_SESSION['user'] == "Manager"){
      include("manager.php") ;} 
      else if($_SESSION['user'] == "Resource"){
          include("resource.php") ;
      }
      else if($_SESSION['user'] == "Leader"){
          include("lead.php") ; 
      }
  }



?>