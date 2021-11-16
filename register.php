<?php
include("./includes/connection.php");
error_reporting(0);
$uErr = "";
if (isset($_POST["sub"])) {
  $email = trim($_POST["mail"]);
  $name = $_POST["uname"];
  $pass = $_POST["pass"];


  //error
  $usernameErr = $emailErr = $passErr = "";
  //mail validation
  if (empty($uname)) {
    $usernameErr = "*Username is required.";
  }


  if (empty($mail)) {
    $emailErr = "*Email is required.";
  }
  if (empty($pass)) {
    $passErr = "*Password is required.";
  }

  if (!empty($email) && !empty($name) && !empty($pass)) {
    if (mysqli_query($conn, "insert into users(name,email,password) values('$name','$email','$pass')")) {
      header("location:index.php");
    } else {
      $uErr = "*User already exists";
    }
  } else {
    $uErr = "*All fields are mandatory";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  
  <link rel="stylesheet" href="./css//register.css">
  <style>
    h4 {
      color: red;
    }

    p {
      padding-left: 90px;
      padding-top: 10px;
      color: black;
      letter-spacing: 1px;

    }
    body{
      /* background-color: #f5f9ee ; */
      background-color: #dfebed;
    /* background-color: whitesmoke; */
    
    }
    .container{
      width: 30rem;
  
    -moz-box-shadow: 0 0 5px 2px silver;
    box-shadow: 0 0 5px 2px silver;

    }
    
  </style>
</head>

<div class="container">
  <h3>Create an Account</h3>
  <!-- <h4><?php echo $err; ?></h4> -->
  <?php
  if (!empty($uErr)) {
  ?>
    <h4><?php echo $uErr ?></h2>
    <?php
  }
    ?>

    <form method="post" enctype="multipart/form-data">

      <label for="username">
        <span>username</span>
        <input type="text" name="uname" placeholder="Enter username" />
        <small><?php echo $usernameErr; ?></small>
      </label>

      <label for="email">
        <span>email</span>
        <input type="email" name="mail" placeholder="Enter email" />
        <small><?php echo $emailErr; ?></small>
      </label>
      <label for="password">
        <span>Password</span>
        <input type="password" name="pass" placeholder="Enter password" />
        <small><?php echo $passErr; ?></small>
      </label><br>







      <button type="submit" name="sub">Submit</button>
      <p>Already user ? <a href="./index.php">Login</a></p>


    </form>

</div>


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     -->
</body>

</html>