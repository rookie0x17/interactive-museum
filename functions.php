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

        echo '<form class="form-inline" style="margin-left:20px;">
            <div class="form-group">
            <input type="hidden" name="page" value="search">
            <input type="text" name="q" class="form-control" id="search" placeholder="Artwork name">
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-left:20px;" > Search </button>
            </form> ';
             
    }

    function displayArtwork(){

        global $link;

        $query = "SELECT * FROM artwork ORDER BY `name` ";
        
        $result = mysqli_query($link , $query);

        

        if(mysqli_num_rows($result) == 0){

            echo "<p>There are no artwork</p>";

        }

        else {

            while ($row = mysqli_fetch_assoc($result)) {

                $buttonPres = '<form class="form-inline">
                <div class="form-group">
                <input type="hidden" name="page" value="artworkPres">
                <input type="hidden" name="namework" value="'.$row['name'].'"
                </div>
                <button type="submit" class="btn btn-secondary" > View </button>
                </form>' ;

                echo "<tr><td> ".$row['name']."</td> <td>".$buttonPres."</td>  <td><img src=".$row['url']. " height='100px' width='100px'> </td> </tr>";
            }

        }

    }

    function displayArtworkSearched(){

        global $link;
        

        $query = "SELECT * FROM artwork WHERE name LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%'";

        

        
        $result = mysqli_query($link , $query);

        if(!$result || mysqli_num_rows($result) == 0){

            echo "<h1>There are no artwork with this name</h1>";

        }

        else {

            while ($row = mysqli_fetch_assoc($result)) {

                $buttonPres = '<form class="form-inline">
                <div class="form-group">
                <input type="hidden" name="page" value="artworkPres">
                <input type="hidden" name="namework" value="'.$row['name'].'"
                </div>
                <button type="submit" class="btn btn-secondary" > View </button>
                </form>' ;

                echo "<tr><td> ".$row['name']."</td> <td>".$buttonPres."</td><td><img src=".$row['url']. " height='100px' width='100px'> </td> </tr>";
            }

        }



    }

    function displayArtworkPres(){

        global $link;
        
        $artname = $_GET['namework'];
        $iduser = $_SESSION['id'];

        $query = "SELECT * FROM artwork WHERE name LIKE '%".mysqli_real_escape_string($link,$artname)."%'";

        $result = mysqli_query($link , $query);

        if(!$result || mysqli_num_rows($result) == 0){

            echo "<h1>There are no artwork with this name</h1>";

        }

        $row = mysqli_fetch_assoc($result);
        
        echo "<h1 class='display-3'> ".$artname."</h1>
            <div class='row' >
                <div class='col-md-4'>
                <img src=".$row['url']." style='max-height:400px;max-width:400px;' >
                </div>
                <div class='col-md-4' id='infoart'>
                <h3><strong>Info about the artwork</strong></h3> 
                <br>
                
                <h5><strong> Author:</strong> ".$row['autore'] ." </h5>
                <br>
                
                <h5><strong> Created in:</strong> ".$row['since'] ."</h5>

                <br>
                <button class='btn btn-primary btn-lg'> Start Hologram </button>
                </div>
            </div>
            

            <div class='row' >
            <div class='col-md-12' id='description'>
            <h2><strong> Description </strong></h2>
            <p class='lead'>".$row['descrizione']."</p>
            </div>
            </div>
        ";
    }

    function displayArtworkComment(){

        $artname = $_GET['namework'];

        global $link;
        
        $artname = $_GET['namework'];
        $iduser = $_SESSION['id'];

        $query = "SELECT * FROM artwork WHERE name LIKE '%".mysqli_real_escape_string($link,$artname)."%'";

        $result = mysqli_query($link , $query);

        if(!$result || mysqli_num_rows($result) == 0){

            echo "<h1>There are no artwork with this name</h1>";

        }

        $row = mysqli_fetch_assoc($result);

        $idartwork = $row['id'];
        

        $query = "SELECT * FROM isRated WHERE idartwork=' ".mysqli_real_escape_string($link,$idartwork)."' ORDER BY `date`";

        $result = mysqli_query($link , $query);

        while ($row = mysqli_fetch_assoc($result)) {

            $rateQuol = createRate($row['rate']);

            $string1 = "<div class='container' id='comment'>
            <div class='row'>            
            <div class='col-md-6'>
            <h5 id='usercomment'><strong>".$row['username']."</strong> </h5>
            </div>
            <div class='col-md-6'><div id='ratestar' >";

            $string1 = $string1 . $rateQuol;

            $string1 = $string1."
            </div>
            </div>
            </div>
            <div class='row'>
            <div class='col-md-12'>
            <p class='lead' id='textofcomment'>".$row['comment']."</p>
            </div>
            </div>
            </div>
            ";

            echo $string1;
        }

    }

    function createRate($rate){
        
        $finalstring="";
        for ($i=0 ; $i<$rate ; ++$i ){
            $finalstring=$finalstring . "<span class='fa fa-star checked'></span>";
        }
        for($i=$rate;$i<5;++$i){
            $finalstring=$finalstring . "<span class='fa fa-star'></span>";
        }

        return $finalstring;
    }
?>