<?php

  $alert = false;
  $alert2 = false;
  $exist="";
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'dbConnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    // $exists = false;
    //check for user exist or not//
    $existSql="SELECT * FROM `user` WHERE username='$username'";
    $result= mysqli_query($con,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0){
      $exist=true;
    }
    else{
      if($password == $cpassword){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
        $result = mysqli_query($con,$sql);
        if($result){
          $alert = true;
        }
      }
      else{
        $alert2=true;
      }
    }
  }
    

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Signup</title>
</head>



<body>
  <!-- <?php // require '_nav.php'; ?> -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">iSecure</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/php/project/login_system/welcome.php">Home</a>
            </li>
        </div>
      </div>
      </nav>

  <?php
     if($alert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your account has been succesfully created..😃
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Click on Button to Login</strong> 
    <a href='/php/project/login_system/login.php'><button class='btn btn-primary'>Login</button></a>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
   //header("location:/php/project/login_system/login.php");
    }
    if($exist){
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Oops</strong> username is already exist..
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }

    if($alert2){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Oops</strong> password doesn't match..
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }

  //   if($exist &&  $alert2){
  //     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  //     <strong>Oops</strong> username already exist and password doesn't match..
  //     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  //   </div>";
  //  }
  ?>



  <div class="container my-4">
    <h1 class="text-center">Signup to our website</h1>

    <form action="/php/project/login_system/signup.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" maxlength="23" class="form-control" name="password" id="password">
      </div>

      <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" id="cpassword">
        <div id="emailHelp" class="form-text">Make sure to type the same password</div>
      </div>

      <button type="submit" class="btn btn-primary">Signup</button>

    </form>
  </div>




  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>