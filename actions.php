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

            echo 1;
        } else {
            $error =  "don't find a good combination";
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

                $query = "UPDATE user SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = " .$_SESSION['id']." LIMIT 1";
                mysqli_query($link , $query);


                echo 1;
                
            } else {
                $error = "Couldn't create user - please try again" ;
            }
        }

    

        
        if ($error != "") echo $error;
        

    }

    

?>