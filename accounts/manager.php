<!DOCTYPE html>

<? 
     global $link ; 
     $query = "SELECT * FROM Project" ; 
    
     $result = mysqli_query($link , $query) ; 
    
     $bar = array();
     
     while($row = mysqli_fetch_assoc($result)){
         $name = $row['project'] ; 
         $query = "SELECT * FROM Tasks WHERE `project` = '".$name."' AND `status` = 'Completed' " ; 
         $bar[$name] = mysqli_num_rows(mysqli_query($link , $query)) ; 
         
     } 





?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/c14caa40e6.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="http://stevemaverick221b-com.stackstaging.com/Hackathon/manager.css">

<title>Manager</title>
</head>

<body>
  <div class="grid-container">

    <header class="header">
      <div class="header__avatar">Manager</div>
      <div class="logout-link">
        <a href="../index.php?function=logout">
          <div class="header__avatar">Logout</div><span title="Logout" class="glyphicon glyphicon-log-in"
            style="size: 1em;"></span>
        </a>
      </div>
    </header>

    <div class="modals">
      
      <!-- Modal -->
      <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">New Project</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name"  class="col-form-label">Project Name:</label>
                  <input type="text" class="form-control project_name" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Deadline:</label>
                  <br>
                  <input type="date" class = "deadline" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="cars">Choose a leader:</label>
                <select style="padding-left: 10px;margin-left: 10px;margin-top: 14px; overflow-y: auto;font-size: 1.3em; width: 400px;"
                  id="cars" class="selected_leader" name="cars">
                       <? displayLeaders() ;?> 
                </select>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Project Description: </label>
                  <textarea class="form-control  p_description" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary add_project" data-dismiss="modal">Confirm</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="assign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">  Assign a leader to this resource:</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <label for="cars">Choose a Project Leader:</label>
              <select class = "assignresource" style="padding-left: 80px;margin-left: 30px;margin-top: 8px; overflow-y: auto;font-size: 1.3em;" id="assignresource"
                name="cars">
                <? displayLeaders() ;?> 
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary addleader" data-dismiss="modal">Save changes</button>
            </div>
          </div>
        </div>
      </div>


    </div>


    <main class="main">
        <div class="main-header">
        <!-- curcular progress bars-->



        <div class="task-status">
          <div class="main-header__heading"><? displayName();?></div>
          <div class="main-header__updates">Here's what's on your plate</div>
        </div>
    
      </div>
      <div class="card" id="dashboard">
       <? displayManagerTable() ; ?>
    </div>

      <!--cards-->




      <div class="main-cards">
        <div class="card" id="tasks">
          <div class="task-container">
          
              <? displayProject() ; ?>
          </div>





        </div>
        <div class="card" id="description">
                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#form">Add Project</button>
          <div class="para">
            
            <h3>New resource list: </h3>
            <div class="list">

            

                 <? displayResource() ; ?>
           



            </div>
          </div>
        </div>
     
         
          
          
      </div>
    </main>

  </div>


</body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="http://stevemaverick221b-com.stackstaging.com/Hackathon/accounts/mger.js"></script>
 

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    
</html>
