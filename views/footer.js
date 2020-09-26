
                  


$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
    var $this = $(this),
        label = $this.prev('label');
   
        if (e.type === 'keyup') {
          if ($this.val() === '') {
            label.removeClass('active highlight');
          } else {
            label.addClass('active highlight');
          }
      } else if (e.type === 'blur') {
          if( $this.val() === '' ) {
          label.removeClass('active highlight'); 
          } else {
          label.removeClass('highlight');   
          }   
      } else if (e.type === 'focus') {
        
        if( $this.val() === '' ) {
          label.removeClass('highlight'); 
          } 
        else if( $this.val() !== '' ) {
          label.addClass('highlight');
          }
      }
   
  });
   
  $('.tab a').on('click', function (e) {
    
    e.preventDefault();
    
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    
    target = $(this).attr('href');
   
    $('.tab-content > div').not(target).hide();
    
    $(target).fadeIn(600);
    
  });





$('#signup-button').click(function(){
    
     $(".sign").submit(function(e){
        e.preventDefault();
    });
    
    var value = $("#user li.active").text() ;
    
    
   $.ajax({
       type:"POST",
       url:"actions.php?action=signup" ,
       data: {user:value ,fname : $("[name=signup_fname]").val() , lname : $("[name=signup_lname]").val(), email:$("[name=signup_email]").val() , password:$("[name=signup_password]").val() },
      success: function(result){
         if(result == "1"){
             
             alert("You have been signed up ! You can login now ") ;
         } 
          else{
              $(".error_message").html(result).show() ; 
          }
          }
      }
   ) ; 
    
    }) ;
    
    
    
    
    
$("#login-button").click(function(){
     
    
    $(".log").submit(function(e){
        e.preventDefault();
    });
    
    
     
    
    var value1 = $("#user li.active").text() ;
        
       $.ajax({
           type:"POST" ,
          url:"login.php?action=login",
           data:{l_email:$("[name=login_email]").val() , l_password:$("[name=login_password]").val(),luser:value1},
           
           success:function(e){
               if(e != "Please check your email/password") {
                   
                   var duce = jQuery.parseJSON(e);
                
                 window.location.href = "http://stevemaverick221b-com.stackstaging.com/Hackathon/accounts/user.php" ;
                   
               }
               else{
                    $(".error_message").html(e).show() ;
                   
               }
              
           }
           
       }) ;
                  
                  }) ;