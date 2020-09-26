<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/c14caa40e6.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="manager.css">
</head>
<title>Document</title>

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
              <h2 class="modal-title" id="exampleModalLabel"> Add Project </h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-modal-body">
              <div class="login-box">
                <form>
                  <div class="user-box">
                    <input type="text" name="" required="">
                    <label>Project Name</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="" required="">
                    <label>Project Description</label>
                  </div>
                  <div class="user-box">
                    <input type="date" name="" required="" style="color: transparent;">
                    <label>Deadline</label>
                  </div>
                  <div class="user-box">
                    <label for="cars">Choose a Project Leader:</label>
                    <select style=style="padding-left: 5px;margin-left: 200px;margin-top: 9px; overflow-y: auto; width: 150px; font-size: 1em;height: 2em;"
                      name="cars">
                    <? displayLeaders() ;?>
                    </select>
                  </div>
                  <a href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Add
                  </a>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>


            </div>
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
              <select class="assignresource" style="padding-left: 80px;margin-left: 30px;margin-top: 8px; overflow-y: auto;font-size: 1.3em;" id="cars"
                name="cars">
                <? displayLeaders() ;?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


    </div>


    <main class="main">
      <div class="main-header">



        <div class="task-status">
          <div class="main-header__heading"><? displayName() ;?></div>
          <div class="main-header__updates">Recent Items</div>
        </div>
      </div>

      <!--cards-->




      <div class="main-cards">
        <div class="card" id="tasks">
          <div class="task-container">
            <div class="task-card" id="task">
              <div class="heading">
                <h4>Project 01:</h4>

              </div>
              <div class="content">
                This is a project
              </div>







            </div>
            <div class="task-card" id="task">


            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>
            <div class="task-card" id="task">

            </div>

          </div>





        </div>
        <div class="card" id="description">

          <div class="para">
            <button class="btn btn-primary" data-toggle="modal" data-target="#form">Add Project</button>
            <h3>New resource list: </h3>
            <div class="list">

            <? displayResource() ; ?>



            </div>
          </div>
        </div>

      </div>
    </main>

    <footer class="footer">

    </footer>
  </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="http://stevemaverick221b-com.stackstaging.com/Hackathon/accounts/mger.js"></script>
</body>
</html>
