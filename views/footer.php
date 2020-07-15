<footer class="footer">

  
      <p style="padding-left:50px">&copy; Interactive Classical Art 2020 <p>
 

</footer>



 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<meta name="google-signin-client_id" content="108995147197-a096lo4rri4vidq1psriucva9pgqq9b9.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  
 <!-- Modal 1 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" id="loginalert"></div>
      <form>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email-l" placeholder="email">
  </div>
  <div class="form-group pass_show-l">
        <label for="opass">Password <span class="required"></span></label>
        <input type="password" name="opass" class="form-control" id="password-l" placeholder="password" required="required" autocomplete="off">
        <span id="error_opass" class="error"></span>
  </div>
  <div class="form-group">
    <label for="google">Login  with Google</label>
     <div class="g-signin2" id="google" data-onsuccess="onLogIn"></div>
	 

  </div>
</form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#changepass" data-dismiss="modal" > Forgot password? </button>
      <button type="button" class="btn btn-primary" id="loginBtn">Login</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal 2 -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger" id="signupalert"></div>
      <form>
   <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" placeholder="email">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" placeholder="username">
  </div>
  <div class="form-group pass_show">
        <label for="opass">Password <span class="required"></span></label>
        <input type="password" name="opass" class="form-control" id="password" placeholder="password" required="required" autocomplete="off">
        <span id="error_opass" class="error"></span>

        <label for="opass">Repeat password <span class="required"></span></label>
        <input type="password" name="opass" class="form-control" id="r-password" placeholder="repeat password" required="required" autocomplete="off">
        <span id="error_opass" class="error"></span>
		<input type="checkbox" class="ptxt" > Show</input>
      </div>
  
  
  

  <div class="form-group">
    <label for="google">Sign up with Google</label>
     <div class="g-signin2" id="google" data-onsuccess="onSignIn"></div>
	

  </div>
</form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="signupBtn">SignUp</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal 3 -->
<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change your password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email-rec" placeholder="Your email">
  </div>
  
  
  <div class="form-group pass_show">
        <label for="opass">New Password <span class="required"></span></label>
        <input type="password" name="opass" class="form-control" id="password-rec" placeholder="password" required="required" autocomplete="off">
        <span id="error_opass" class="error"></span>

        <label for="opass">Repeat password <span class="required"></span></label>
        <input type="password" name="opass" class="form-control" id="r-password-rec" placeholder="repeat password" required="required" autocomplete="off">
        <span id="error_opass" class="error"></span>
		<input type="checkbox" class="ptxt" > Show</input>
      </div>
</form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="change-pass">Change Password</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        
      </div>
    </div>
  </div>
</div>

<script>
	var profile;
    function onLogIn(googleUser) {
      // get user profile information
      console.log(googleUser.getBasicProfile())
	  profile = googleUser.getBasicProfile();
	
	
	  //window.location.assign("https://localhost/int-museum/?page=home");
	  $.ajax({
        type: "POST",
        url: "actions.php?action=logingoogle",
        data: "email=" +profile.getEmail() ,
        success: function(result) {
          if(result == "1"){
			  
            window.location.assign("https://localhost/int-museum/?page=home");
          } else {

            $("#loginalert").html(result).show();

          }
        }
    })
    }
	
	function onSignIn(googleUser) {
      // get user profile information
      console.log(googleUser.getBasicProfile())
	  profile = googleUser.getBasicProfile();
	
	
	  //window.location.assign("https://localhost/int-museum/?page=home");
	  $.ajax({
        type: "POST",
        url: "actions.php?action=signupgoogle",
        data: "email=" +profile.getEmail() ,
        success: function(result) {
          if(result == "1"){
			  
            window.location.assign("https://localhost/int-museum/?page=home");
          } else {

            $("#signupalert").html(result).show();

          }
        }
    })
    }
  </script>


<script>

  



  $("#loginBtn").click(function() {
    $.ajax({
        type: "POST",
        url: "actions.php?action=login",
        data: "email=" + $("#email-l").val() + "&password=" + $("#password-l").val() ,
        success: function(result) {
          if(result == "1"){
            window.location.assign("https://localhost/int-museum/?page=home");
          } else {

            $("#loginalert").html(result).show();

          }
        }
    })

  })

  $("#signupBtn").click(function() {
    $.ajax({
        type: "POST",
        url: "actions.php?action=signup",
        data: "email=" + $("#email").val() +"&username="+ $("#username").val() +"&password=" + $("#password").val() + "&r-password=" + $("#r-password").val() ,
        success: function(result) {
          if(result == "1"){
            window.location.assign("https://localhost/int-museum/?page=home");
          } else {

            $("#signupalert").html(result).show();

          }
        }
    })

  })

  $("#change-pass").click(function() {
    $.ajax({
        type: "POST",
        url: "actions.php?action=passforgot",
        data: "email-rec=" + $("#email-rec").val()+"&password-rec="+ $("#password-rec").val() +"&r-password-rec=" + $("#r-password-rec").val(),
        success: function(result) {
          if(result == "1"){
            alert("Password changed successfully");
            window.location.assign("https://localhost/int-museum/?page=home");
          }  else {
            alert(result);

          }
        }
    })

  })
  
  
  $(document).on('click','.pass_show .ptxt', function(){ 
	$(this).text($(this).text() == "Show" ? "Hide" : "Show");
	$(this).prev().prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
	$(this).prev().prev().prev().prev().prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
});

$(document).ready(function(){
	$('.pass_show-l').append('<input type="checkbox" class="ptxt-l" > Show</input>');
});
$(document).on('click','.pass_show-l .ptxt-l', function(){ 
	$(this).text($(this).text() == "Show" ? "Hide" : "Show");
	$(this).prev().prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
});



</script>


  </body>
</html>