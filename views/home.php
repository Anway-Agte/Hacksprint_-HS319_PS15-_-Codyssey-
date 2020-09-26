<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Taskit</title>
</head>
<body>
    <div class="header">
        <a href="in.html"><h2>Task Manager</h2></a>
    </div>
    <div class="form">
        
        <ul id="user" class="top-area">
            <li class="tab active", value="resource"><a href="#">Resource</a></li>
            <li class="tab", value="manager"><a href="#">Manager</a></li>
            <li class="tab", value="lead"><a href="#">Leader</a></li>
        </ul>
        <ul class="bottom-area">
            <li class="tab"><a href="#signup">Sign Up</a></li>
            <li class="tab active"><a href="#login">Log In</a></li>
          </ul>
        
        <div class="tab-content">
                 
          <div id="login">   
            <h1>Welcome Back!</h1>
            
            <form   class = "log " method="post">
            
              <div class="label-field">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name="login_email" required autocomplete="off"/>
            </div>
            
            <div class="label-field">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="login_password" required autocomplete="off"/>
            </div>
            
            <p class="forgot"><a href="#">Forgot Password?</a></p>
             <div class="error_message">
              okay
            </div>
            <button  id ="login-button" class="button button-block" />Log In
            
            </form>
   
          </div>
          
          <div id="signup">   
            <h1>Sign Up for Free</h1>
            
            <form class = "sign" method="post">
            
            <div class="top-row">
              <div class="label-field">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input type="text" name="signup_fname" required autocomplete="off" />
              </div>
          
              <div class="label-field">
                <label>
                  Last Name<span class="req">*</span>
                </label>
                <input type="text" name="signup_lname" required autocomplete="off"/>
              </div>
            </div>
   
            <div class="label-field">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name="signup_email" required autocomplete="off"/>
            </div>
            
            <div class="label-field">
              <label>
                Set A Password<span class="req">*</span>
              </label>
              <input type="password" name="signup_password" required autocomplete="off"/>
            </div>
           
            <div class="error_message">
              okay
            </div>
            
                <button  id ="signup-button" class="button button-block">Sign Up</button>
            
            </form>
   
          </div>
     
        </div>  
  </div>
   
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="views/footer.js"></script>
</body>
</html>