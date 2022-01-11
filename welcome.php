<?php

require_once "config.php";

session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
  <?php include('templates/header1.php'); ?>
  <?php include('templates/csstags.php'); ?>
  </head>
  <body>

  <!-- <div class="container_welcome">
      <h3><?php echo "Welcome ". $_SESSION['username']?>!</h3>
  </div> -->


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/img1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/img1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/img1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="heading">
  <h1 style=padding-top:10px;><center>Pets</center></h1>
</div>
  <?php include('getas_cards.php'); ?>
	<?php include('templates/footer.php'); ?>
	<?php include('templates/scriptags.php'); ?>

  </body>
</html>