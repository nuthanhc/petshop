<?php

include("config.php");
 if($conn->connect_error)
 { 
     die('Connection Failed : '.$conn->connect_error);

 }
 else
 {
     $petname = $_REQUEST['petname'];
     $age= $_REQUEST['age'];
     $id = $_REQUEST['id'];
     $specie = $_REQUEST['specie'];
     $breed = $_REQUEST['breed'];
     $color = $_REQUEST['color'];
    //  $image = $_REQUEST['image'];
     $cost = $_REQUEST['cost'];
     $paragraph = $_REQUEST['paragraph'];
    //  echo $name;
     $stmt = mysqli_query($conn,"update pet set petname=' ".$petname."',age=' ".$age."',specie=' ".$specie."' ,breed=' ".$breed."' ,color=' ".$color."' ,cost=' ".$cost."',paragraph=' ".$paragraph."'   where id=' ".$id."';");
    //  $stmt->execute();
    //  echo "success";
    //  $stmt->close();
    //  $conn->close();
    include ("adminTable.php");
 }
 ?>
