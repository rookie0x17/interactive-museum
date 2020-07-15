<?php

    include("functions.php");


    if ($_GET['action'] == "login"){

        $error = "" ;

        if (!$_POST['email']) {

            $error = "An email address or an username is requested" ;
        }

        else if (!$_POST['password']) {

            $error = "A password is requested" ;
        } 
        
        else if (!filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
          }
        
        else {
        $query = "SELECT * FROM user WHERE email= '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
        $result = mysqli_query($link, $query);

        

        $row = mysqli_fetch_assoc($result) ;     
        
       
        if ($row['password'] == md5(md5($row['id']).$_POST['password']) ) {

            $_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];

            echo 1;
        } else {
            $error =  "don't find a good combination";
        }
        }
        if ($error != "") echo $error;


    

     

    }
	
	
	
	if ($_GET['action'] == "logingoogle"){

        $error = "" ;

        if (!$_POST['email']) {

            $error = "An email address or an username is requested" ;
        }

       
        
        else if (!filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
          }
        
        
       else {
        $query = "SELECT * FROM user WHERE email= '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
        $result = mysqli_query($link, $query);

        

        $row = mysqli_fetch_assoc($result) ;     
  

            $_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];

            echo 1;
        
        }
        if ($error != "") echo $error;

    }
	
	
	if ($_GET['action'] == "signupgoogle"){

        $error = "" ;

        if (!$_POST['email']) {

            $error = "An email address or an username is requested" ;
        }

       
        
        else if (!filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
          }
        
        $query = "SELECT * FROM user WHERE email= '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0 ) $error = "That email is already taken";
        else {
            $query = "INSERT INTO user (email) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."' ) ";
            if (mysqli_query($link , $query)) {
                
                $_SESSION['id'] = mysqli_insert_id($link);
				

              


                echo 1;
                
            } else {
                $error = "Couldn't create user - please try again" ;
            }
        }

    

        
        if ($error != "") echo $error;
        

    }
	

    if ($_GET['action'] == "signup"){

        $error = "" ;

        if (!$_POST['email']) {

            $error = "An email address is requested" ;
        }

        else if (!$_POST['username']) {

            $error = "An username is requested" ;
        } 


        else if (!$_POST['password']) {

            $error = "A password is requested" ;
        } 

        else if ($_POST['r-password'] != $_POST['password']) {

            $error = "Password must be the same" ;
        } 

        else if (!filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        }
        
        $query = "SELECT * FROM user WHERE email= '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0 ) $error = "That email is already taken";
        else {
            $query = "INSERT INTO user ( email ,password , username) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."' , 
            '". mysqli_real_escape_string($link, $_POST['password'])."' , '". mysqli_real_escape_string($link, $_POST['username']). "' ) ";
            if (mysqli_query($link , $query)) {
                
                $_SESSION['id'] = mysqli_insert_id($link);
				$_SESSION['username'] = $_POST['username'];

                $query = "UPDATE user SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = " .$_SESSION['id']." LIMIT 1";
                mysqli_query($link , $query);


                echo 1;
                
            } else {
                $error = "Couldn't create user - please try again" ;
            }
        }

    

        
        if ($error != "") echo $error;
        

    }
	
	
	if ($_GET['action'] == "commit"){
		$iduser = $_SESSION['id'] ;
		$username = $_SESSION['username'] ;
		$artname = $_POST['name'];
		$rate = $_POST['rate'];
        $error = "" ;

        $favorite = $_POST['favorite'];
        
        
        
        
		
        if (!$_POST['rate']) {

            $error = "A ratio is requested" ;
        }

        else if (!$_POST['comment']) {

            $error = "A comment is requested" ;
        } 
		
		
		

      /* $query = "SELECT * FROM israted WHERE (iduser = '$_SESSION['id']', idartwork = '$idartwork')";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) = $_POST['rate'] ) $error = "Same value"; */
         else {
                    $query = "SELECT * FROM artwork WHERE name LIKE '%".mysqli_real_escape_string($link,$artname)."%'";
                    
                    

					$result = mysqli_query($link , $query);

						if(!$result || mysqli_num_rows($result) == 0){

							$error = "There are no artwork with this name";

							}
		
					$row = mysqli_fetch_assoc($result);

					$idartwork = $row['id'];
		 
					$query = "INSERT INTO isRated (iduser,idartwork, rate ,comment,date,username,favorite) VALUES ('$iduser' ,'$idartwork','". mysqli_real_escape_string($link, $_POST['rate'])."' , 
					'". mysqli_real_escape_string($link, $_POST['comment'])."', NOW(),'$username' ,'$favorite') ";
						if (mysqli_query($link , $query)) {
                

							echo 1;
                
						} else {
								$error = "Couldn't create user - please try again" ;
					}
				}
		 

    

        
        if ($error != "") echo $error;
        
        
        

    }

    if ($_GET['action'] == "passforgot"){

        $error = "" ;

        if (!$_POST['email-rec']) {

            $error = "An email address requested" ;
        } 

         
        else if (!$_POST['password-rec']) {

            $error = "A password is requested" ;
        } 

        else if ($_POST['password-rec'] != $_POST['r-password-rec']) {

            $error = "Password must be the same" ;
        } 
        

        else {
            $query = "SELECT * FROM user WHERE email= '". mysqli_real_escape_string($link, $_POST['email-rec'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result) ; 

            if(mysqli_num_rows($result) == 0 ) echo "There is not a user with this email";
            else {

                $query = "UPDATE user SET password = '". md5(md5($row['id']).$_POST['password-rec']) ."' WHERE id = " .$row['id']." LIMIT 1";
                mysqli_query($link , $query);
                echo 1;
        } 
    }


       

        
        
        
        
       
    }

    

    

?>