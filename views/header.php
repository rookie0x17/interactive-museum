<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Interactive Museum</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="" style="font-style:italic">Interactive Art Museum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="?page=home"> Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="?page=artwork"> Artwork </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=tutorial">Tutorial</a>
      </li>
      
    </ul>
  </div>
  <form class="form-inline pull-xs-right">
    
  <?php 
      if(!EMPTY($_SESSION['id'])) { 
  ?>
        <a class="btn btn-primary btn-lg" href="?function=logout" style="margin-right:15px" > Logout</a>
  
</button>

  <?php } else { ?>

    
 
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login" style="margin-right:15px" > Login </button>  
  <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#signup" style="margin-right:20px"> Sign Up </button>

    <?php }  ?>
  </form>
</nav>