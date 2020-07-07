<?php

    session_start();
    $_SESSION['id'] = isset( $_SESSION['id'] )? $_SESSION['id'] : '';

    $link = mysqli_connect("localhost" , "daniel" , "museum" , "int-museum");

    if (mysqli_connect_errno()) {

        print_r(mysqli_connect_error());
        exit();
    }

    if (isset($_GET['function']) && $_GET['function']== "logout"){
        session_unset();
    }

    function displayRecentArtwork(){

        global $link;

        $query = "SELECT * FROM artwork ORDER BY `date` DESC LIMIT 10 ";
        
        $result = mysqli_query($link , $query);

        if(mysqli_num_rows($result) == 0 ){

            echo "There are no artwork";

        }

        else {

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<p class='artworkName'>". $row['name'] ." <span class='time' > " . $row['date'] . "</p>" ;
            }

        }

    }
?>