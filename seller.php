<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['sellername']))
{
    header("location: add_pets.php ");
    exit;
}
require_once "config.php";

$sellername = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['sellername'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter sellername + password";
    }
    else{
        $sellername = trim($_POST['sellername']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, sellername, password FROM seller WHERE sellername = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_sellername);
    $param_sellername = $sellername;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $sellername, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["sellername"] = $sellername;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: add_pets.php");
                            
                        }
                    }

                }

    }
}    


}


?>
<!doctype html>
<html lang="en">
  <head>
  <?php include('templates/header.php'); ?>
  <?php include('templates/css_login.php'); ?>

  </head>
  <body>
<div class="space"></div>
<div class="container">
<h3>Seller Log-in:</h3>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1"><b>sellername :</b></label>
    <input type="text" name="sellername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter sellername">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Password :</b></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    <a href="#">Forgot password?</a>
  </div>
  <button type="submit" class="btn btn-primary">Log-in</button>
  <br><br>
  <p>Create your account ? <a href="register.php"> <u>Sign-UP</u></a></p>
  
</form>



</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>