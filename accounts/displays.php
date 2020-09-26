<? 
include("../functions.php") ;
error_reporting( E_ALL );
  
 function displayName(){
     
     global $link ; 
     
     $query = "SELECT * FROM ".$_SESSION["user"]." WHERE `id` = '".$_SESSION["id"]."'" ; 
      
     $result = mysqli_query($link , $query) ; 
     
     $row = mysqli_fetch_assoc($result) ; 
     
     print_r($row['name']) ; 
 }
 
 function displayLeaders(){
     global $link ; 
     
     $query = "SELECT `name`,`id` FROM `Leader`" ; 
     $result = mysqli_query($link , $query) ; 
     $leaders = array() ; 
    
     while($row = mysqli_fetch_row($result)){
         $leaders[] = $row[0] ; 
        
     }
      echo  "<option>".implode("</option><option>" , $leaders)."</option>" ; 
     
     
 }

function displayResource(){
    global $link ; 
    
    $query = "SELECT `name` FROM `Resource` WHERE `leader` = ''" ; 
    $result = mysqli_query($link , $query) ; 
    $resources = array() ;
    if(mysqli_num_rows($result)>0){
        $string = '<ul class="list-group list-group-flush noleader">';
        while($row = mysqli_fetch_row($result)){
         $resource[] = $row[0] ; 
        
     }
      
     
    
     $string.='<li data-toggle="modal" data-target="#assign" class="list-group-item"><option>'.implode('</li><li data-toggle="modal" data-target="#assign" class="list-group-item"><option>' , $resource)."</li>" ; 
        $string.="</ul>" ;
        echo $string ;
    
}else{
        echo "" ;
    }
  
} 

function displayProject(){
    global $link ;
    $query = "SELECT * FROM Project" ;
    $result = mysqli_query($link , $query) ;
    $fin = 0 ; 
    if(mysqli_num_rows($result) > 0){
        
        $projecthtml = "" ;
        while($row = mysqli_fetch_assoc($result)){
             $query = "SELECT * FROM Tasks WHERE `project` = '".$row['project']."'" ; 
            $r = mysqli_query($link , $query);
            $total_tasks = mysqli_num_rows($r) ; 
            if($total_tasks > 0){
            $query = "SELECT * FROM Tasks WHERE `project` = '".$row['project']."' AND `status` = 'Completed'" ; 
            $r = mysqli_query($link , $query);
            $completed_tasks = mysqli_num_rows($r) ;
            $val = $completed_tasks/(float)$total_tasks ; 
            $fin = $val*100 ; } 
            $projecthtml.=  '<div class="task-card" id="task">
              <div class="heading">
                <h4>'.$row['project'].'</h4>
                
              </div>
              <div class="content">'.$row['description'].'
              </div>
               <div class="progress-wrapper" id="progress-wrapper">
                  <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$fin.'"
                    aria-valuemin="0" aria-valuemax="100" style="width:'.$fin.'%">
                      
                    </div>
                  </div>
              </div>






            </div>' ;
        }
        
        echo $projecthtml ; 
        
    }else{
        
        echo " NO Projects to show here ! " ;
     
    }
     
} 
 

function displayLeadProject(){
    
    global $link ; 
    
    $query = "SELECT * FROM Project WHERE `leader_id` = '".$_SESSION['id']."'" ; 
    $result = mysqli_query($link , $query) ;
    if(mysqli_num_rows($result) > 0){
        $html = "" ; 
         while($row = mysqli_fetch_assoc($result)){
         if($row['project'] != ""){
           $html.= '<li class="list-group-item">'.$row['project'].' </li>' ; 
         } }
        
        echo $html ; 
    }
    else{
        echo mysqli_error($link) ;
    }
    
}

function displayLeaderResources(){
    global $link ; 
    $query = "SELECT * FROM ".$_SESSION["user"]." WHERE `id` = '".$_SESSION["id"]."'" ; 
      
     $result = mysqli_query($link , $query) ; 
     
     $row = mysqli_fetch_assoc($result) ; 
     
    $query = "SELECT * FROM Resource WHERE `leader` = '".$row['name']."'" ;
    
    $result =  mysqli_query($link , $query) ;
    
    $html = "" ;
    
    while($row = mysqli_fetch_assoc($result)){
        
        $html.='<option>'.$row['name'].'</option>' ;
    } 
    
    echo $html ; 
    
    
    
    
}

function displayResTasks($category){
    global $link ; 
    if($category == "All Tasks"){
    $query  = "SELECT * FROM Tasks WHERE `resource_id` = '".$_SESSION['id']."' AND NOT `status` = 'Request Change' " ; 
    }else if($category == "In-Progress Tasks"){
         $query  = "SELECT * FROM Tasks WHERE `resource_id` = '".$_SESSION['id']."' AND `status` = 'In Progress' " ; 
    }
    else if($category == "Backlog Tasks"){
        $query  = "SELECT * FROM Tasks WHERE `resource_id` = '".$_SESSION['id']."' AND `status` = 'Backlog' " ;
        
    }else{
        $query  = "SELECT * FROM Tasks WHERE `resource_id` = '".$_SESSION['id']."' AND `status` = 'assigned' " ;
    }
    $result = mysqli_query($link , $query) ; 
    
    if(mysqli_num_rows($result)){
        $html = "" ; 
     while($row = mysqli_fetch_assoc($result) ){
         $html.='<li class="list-group-item " name = "'.$row['id'].'">'.$row['task'].'<button data-toggle="modal" data-target="#submit" class="list-button submitbutton"" name = "'.$row['id'].'"
                  style="background-color:transparent; border: none;"><span title="Mark as done" class="fas fa-check"
                    style="font-size: 1em;"></span></button>

                <!--button 2-->
                <button class="list-button inprogress"  name = "'.$row['id'].'" style="background-color:transparent; border: none;"><span
                    title="Mark as currently doing" class="fas fa-tasks" style="font-size: 1em;"></span></button>

                <!--button 3-->
                <button data-toggle="modal" data-target="#change" name = "'.$row['id'].'"  class="list-button changebutton"  
                  style="background-color:transparent; border: none;"><span title="Request for change in the task"
                    class="fas fa-edit" style="font-size: 1em;"></span></button>
                
              </li>';
     } 
        echo $html ; 
     
    }
    
}  



if($_GET['action'] == 'modres'){
    
    displayResTasks($_POST['val']) ; 
}


function displayRequest(){
     global $link ; 
     $query  = "SELECT * FROM Tasks WHERE `status` = 'Request Change' AND `leader_id` = '".$_SESSION['id']."'" ; 
     $result = mysqli_query($link , $query);
     if(mysqli_num_rows($result)>0){
         $string = "" ; 
        while($row = mysqli_fetch_assoc($result)){
           
            $quer2 = "SELECT * FROM Resource WHERE `id` = '". $row['resource_id']."'" ; 
            $res = mysqli_query($link , $quer2) ; 
            $now = mysqli_fetch_assoc($res) ; 
            $string.= '<li class="list-group-item" name = "'.$row['id'].'">'.$now['name'].'<br>Task : '.$row['task'].' <button class="list-button decline" name = "'.$row['id'].'" data-toggle="modal" data-target="#dismiss" style="background-color:transparent; border: none;"><span
                        title="Decline Task Change Request" class="fas fa-times"
                        style="font-size: 1em;"></span></button>

                    <!--button 2-->
                    <button data-toggle="modal" data-target="#reassign" name = "'.$row['id'].'" class="list-button reassign"
                      style="background-color:transparent; border: none;"><span title="Reassign Task"
                        class="fas fa-check" style="font-size: 1em;"></span></button>

                    



                  </li>' ;
           
        } echo $string ;  
     }
}


function displayManagerTable(){
    global $link ; 
    $html = '<div class="dashboard-content">
            <!-- dahsboard -->
            <div class="table-container">         
              <table class="table table-condensed">
                <thead>
                   
                  <tr>
                    <th>Project</th>
                    <th>Tasks</th>
                    <th>Leader</th>
                    <th>Completed Tasks</th>
                    <th>Backlog Tasks</th>
                  </tr>
                </thead>' ; 
    $query = "SELECT * FROM Project" ; 
    $result = mysqli_query($link , $query) ;
       if(mysqli_num_rows($result)>0){
         $html.= '<tbody>' ;
        while($row = mysqli_fetch_assoc($result)){
        
        $q1 = "SELECT * FROM Tasks WHERE `project` = '".$row['project']."'" ;
        $r =  mysqli_query($link , $q1) ;
        $tasks = mysqli_num_rows($r) ; 
        $q2 = "SELECT * FROM Leader WHERE `id` = '".$row['leader_id']."'" ; 
        $r = mysqli_query($link , $q2) ;
        $l = mysqli_fetch_assoc($r) ; 
         $leader = $l['name'] ; 
         $q3 = "SELECT * FROM Tasks WHERE `project` = '".$row['project']."' AND `status` = 'Completed'" ;
         $r = mysqli_query($link , $q3) ;
         $completed = mysqli_num_rows($r) ; 
         $q3 = "SELECT * FROM Tasks WHERE `project` = '".$row['project']."' AND `status` = 'Backlog'" ;
         $r = mysqli_query($link , $q3) ;
         $back = mysqli_num_rows($r) ; 
         
         $html.='<tr class="table-project">
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                  </tr><tr>
                    <td>'.$row['project'].'</td>
                    <td>'.$tasks.'</td>
                    <td>'.$leader.'</td>
                    <td>'.$completed.'</td>
                    <td>'.$back.'</td>
                  </tr>' ;
         
        
        
     }
     $html.= '</tbody>' ;
     }
    
    $html .= '  </table>
            </div>
        </div>'  ; 
    
    echo $html ; 
}



function displayLeaderTable(){
    
     global $link ; 
    

     
    $html = '  <div class="dashboard-content">
            <!-- dahsboard -->
            <div class="table-container">         
              <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>Resource</th>
                    <th>In Progress Tasks</th>
                    <th>Completed Tasks</th>
                    <th>Backlog Tasks</th>
                  </tr>
                </thead>
                <tbody>' ; 
     $query = "SELECT * FROM ".$_SESSION["user"]." WHERE `id` = '".$_SESSION["id"]."'" ; 
      
     $result = mysqli_query($link , $query) ; 
     
     $row = mysqli_fetch_assoc($result) ; 
     
     
    
    $query = "SELECT * FROM Resource WHERE `leader` = '".$row['name']."'" ;
    
     $result = mysqli_query($link , $query) ;
       if(mysqli_num_rows($result)>0){
            while($now = mysqli_fetch_assoc($result)){
                $name = $now['name'] ;
                
                $query = "SELECT * FROM Tasks WHERE `resource_id` = '".$now['id']."'" ; 
                
                $tasks = mysqli_num_rows( mysqli_query($link , $query));
                
                $query = "SELECT * FROM Tasks WHERE `resource_id` = '".$now['id']."' AND `status` = 'Completed'" ;
                
                $completed = mysqli_num_rows( mysqli_query($link , $query));
                $query = "SELECT * FROM Tasks WHERE `resource_id` = '".$now['id']."' AND `status` = 'Backlog'" ;
                
                $backlog = mysqli_num_rows( mysqli_query($link , $query));
                
                $html.='<tr>
                    <td>'.$name.'</td>
                    <td>'.$tasks.'</td>
                    <td>'.$completed.'</td>
                    <td>'.$backlog.'</td>
                  </tr>' ; 
                
            }
         
           
       }
      $html.=' </tbody>
              </table>
            </div>
      
    </div>';
    
    echo $html ; 
    
}

 function displayNewCount(){
            global $link ;  
            $query = "SELECT * From Tasks WHERE `status` = `assigned` AND `resource_id` = .".$_SESSION['id']."'" ;
            $result = mysqli_query($link , $query) ;
            echo mysqli_num_rows($result) ; 
 }
?>