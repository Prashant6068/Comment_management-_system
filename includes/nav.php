
<?php
// $name = $_SESSION['uname'];
$mail = $_SESSION['email'];

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Comment</title>
  <style>
    .p1 {
      width: 600px;


      box-shadow: 5px 5px 10px black;
      /* background-color: #EDF6E5; */
      background-color: #0C0C0C;
    }

    body .p1 {
      background-color: #e8f3e8;


    }

    .navbar {

      background: whitesmoke !important;
    }

    .lead {
      font-family: Georgia, 'Times New Roman', Times, serif;

    }

    .content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light  p3 shadow">
   
    <a class="navbar-brand mx-3 text-light" href="dashboard.php"><img class="text-light bg-light" src="data:image/png;base64,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" width="30px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
       
        <li class="nav-item mx-3">

          <a class="nav-link  text-uppercase font-weight-bold " href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link  text-uppercase font-weight-bold " href="view.php">View Post<span class="sr-only">(current)</span></a>
        </li>
        

      
        <li class="nav-item mx-3">
          <a class="nav-link  text-uppercase font-weight-bold" href="dashboard.php">Add Post</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto text-center">

        <li class="nav-item mx-3">
          <a class="nav-link  text-uppercase font-weight-bold">Welcome: <?php echo $mail; ?></a>
          
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item mx-3">
         
          <a class="btn btn-dark my-2 my-sm-0" href="logout.php">Logout </a>
         
        </li>
      </ul>

    </div>
  </nav>