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

    function displaySearch() {

        echo '<form class="form-inline">
            <div class="form-group">
            <input type="text" class="form-control" id="search" placeholder="Artwork name">
            </div>
            <button type="submit" class="btn btn-secondary"> Search </button>
            </form> ';
             
    }

    function displayArtwork(){

        global $link;

        $query = "SELECT * FROM artwork ORDER BY `name` ";
        
        $result = mysqli_query($link , $query);

        if(mysqli_num_rows($result) == 0 ){

            echo "<p>There are no artwork</p>";

        }

        else {

            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr><td> ".$row['name']."</td> <td>".$row['date']."</td>  <td> </td> </tr>"  ;
            }

        }

    }
?>