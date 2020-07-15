

<div class="mainContainer">

    <div class="row">

        <div class="col-md-3">
        </div>       
        <div class="col-md-6" id="forgotpassform">
        <h1> Change your password </h1>
        <form class="form">
            <div class="form-group">
            <p> Email: </p>
            <input type="text" name="email-rec" value="" class="form-control" id="email-rec" placeholder="email to recovery">
            </br>
            <p> New password: </p>
            <input type="password"  class="form-control" placeholder="new password">
            </br>
            <p> Repeat new password: </p>
            <input type="password"  class="form-control" placeholder="repeat new password">
            </br>

            </div>
            <input type='hidden' name='page' value='passforgot'>
            <button type="submit" class="btn btn-primary" id="changepass"> Change Password  </button>
            <button type="submit" class="btn btn-secondary" id="backbutton">  Back  </button>
            </br>

            <?php displaySuccess();?>
            
            </form>
           
        </div>

        <div class="col-md-3" >

        

        </div>

    </div>
    
    

</div>

