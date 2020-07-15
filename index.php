<?php
    
    $this_page = 'home';

    include("functions.php");

    include("views/header.php");

    if (!isset($_GET['page'])){

        include("views/home.php");
        

    } else if ($_GET['page'] == 'artwork') {

        include("views/artwork.php");
        
    } else if($_GET['page'] == 'tutorial') {

        include("views/tutorial.php");
        

    } else if($_GET['page'] == 'hologram') {

        include("views/hologram.html");


    } else if($_GET['page'] == 'search') {

        include("views/search.php");

    } else if($_GET['page'] == 'artworkPres') {

        include("views/artworkPres.php");
    }else if($_GET['page'] == 'favorite') {

        include("views/favorite.php");

    } else {

        include("views/home.php");

    }


    

    include("views/footer.php");

?>