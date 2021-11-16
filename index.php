<?php
include("./includes/connection.php");
error_reporting(0);
$uErr = "";
if (isset($_POST['sub'])) {
  $mail = $_POST["mail"];
  $pass = $_POST["pass"];

  $emailErr = $passErr = "";
  //mail validation



  if (empty($mail)) {
    $emailErr = "*Email is required.";
  }

  if (empty($pass)) {
    $passErr = "*Password is required.";
  }



  if (!empty($mail) && !empty($pass)) {
    if (isset($mail)) {
      $sql = mysqli_query($conn, "select * from users where email='$mail'");
      if (mysqli_num_rows($sql) > 0) {
        $arr = mysqli_fetch_array($sql);
        $mail_id = $arr["email"];
        $uname = $arr["name"];
        $password = $arr["password"];
        if ($pass == $password) {
          session_start();
          $_SESSION["email"] = $mail_id;
          $_SESSION["uname"] = $uname;
          header("location:view.php");
        } else {
          $uErr = "*Password is incorrect";
        }
      } else {
        $uErr = "*Email not match";
      }
    }
  } else {
    $uErr = "*All fields are mandatory";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">     -->
  <link rel="stylesheet" href=".//css//register.css">
  <style>
    h4 {
      color: red;
    }

    p {
      padding-left: 40px;
      padding-top: 10px;
      letter-spacing: 1px;
    }

    small {
      font-weight: 600;
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
  <h3>Login</h3>
  <!-- <img src="https://i.pinimg.com/originals/97/21/05/972105c5a775f38cf33d3924aea053f1.jpg" width="100%" height="100%" alt=""> -->
  <!-- <h4><?php echo $err; ?></h4> -->
  <?php
  if (!empty($uErr)) {
  ?>
    <h4><?php echo $uErr ?></h2>
    <?php
  }
    ?>

    <form method="post" enctype="multipart/form-data">



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
      <p>Don't have an account ? <a href="./register.php">Signup</a></p>


    </form>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>