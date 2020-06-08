<?php

  $login=false;
  $showerr=false;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  

  include'dbconnect.php';
  $username=$_POST["username"];
  $password=$_POST["password"];



      $sql="Select * from users where username='$username' AND password='$password' ";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);


 if($num == 1)

{
     $login=true;

     session_start();
     $_SESSION['loggedin']=true;
     $_SESSION['username']=$username;
    header("location: welcome.php");


}

else
{

 $showerr="Invalid Creditential: ";
}

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <?php require 'partial/nav.php' ?>
  <?php
  if($login)
  {
  echo '<div class="alert alert-success alert-digsmissible fade show" role="alert">
  <strong>Sucess !</strong> Your Account  Login...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}


if ($showerr) {

  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Roor  !</strong> Plese Entered Same Password As Enterd Above .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
?>




<div class="container ">
  

  <h1  class="text-center mt-3">Login  To Our Website </h1>
<form action="/password/login.php" method="post">
  <div class="form-group my-4">

    <label for="username">Username</label>
    <input type="email" class="form-control" id="username" name="username" aria-describedby="nameHelp">
  

  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password"> 
      <small id="emailHelp" class="form-text text-muted">We'll never share your Password with anyone else.</small>
  </div>



  <button type="submit" class="btn btn-primary">Login </button>
</form>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>