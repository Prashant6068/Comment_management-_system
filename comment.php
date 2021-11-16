<?php
include("./includes/connection.php");
$pid = $_GET['que'];
session_start();
$uname = $_SESSION["uname"];
$sel = mysqli_query($conn, "select * from posts where id=$pid");
if (mysqli_num_rows($sel) > 0) {
    $arr = mysqli_fetch_assoc($sel);
    $impath = $arr['img_path'];
}
if (isset($_POST["sub"])) {
    $cmnt = $_POST["cmnt"];
    if (mysqli_query($conn, "insert into commentbox(post_id,user_name,comment)values
    ($pid,'$uname','$cmnt')")) {
        header("location:view.php");
    } else {
        echo "not uploaded";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<!DOCTYPE html>
<html>

<head>
    <title>Comment</title>
    <link rel="stylesheet" type="text/css" href="./css//boostrap.css">
    <style>
        label {
            font-weight: 700;
            padding-right: 400px;

        }

        body {
            background-color: #f5f9ee !important;
        }

        img {
            border-radius: 50%;
            border: 3px solid white;

        }

        .container {
            margin-top: 110px;
        }

        .card {
            width: 40%;
            margin-top: 100px;
        }

        .form-group textarea {
            height: 40px;
            margin-right: 18px;
            border: none;
            outline: none;
            padding: 0 15px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 3px 3px 8px #aaaaaa, 5px 5px 10px #ffffff;
        }

        .form-group textarea:focus {
            box-shadow: inset 5px 5px 10px #aaaaaa, inset 5px 5px #ffffff;
        }
    </style>

</head>

<body>
    <!-- <?php include("./nav.php") ?> -->
    <?php include("./includes/nav.php") ?>
    <div class="container ">
        <div class="row justify-content-center h-100">
            <div class="card my-auto shadow">
                <div class="card-header text-center bg-dark text-white">
                    <!-- <h2>Comment</h2> -->
                    <img src="<?php echo $impath ?>" height="100px" width="100px" /><br />
                </div>
                <div class="card-body mt-8">
                    <form method="post" enctype="multipart/form-data">

                        <!-- <div class="form-group">
                            <label for="Title" class="text-uppercase"> Comment: </label>
  
                            <input type="text" name="cmnt" class="form-control ">
                        </div> -->
                        <div class="form-group">
                            <label for="Description">Comment</label>

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" cols="30" name="cmnt"></textarea>
                        </div>


                        <button type="submit" name="sub" class="btn btn-dark w-30">Submit</button>

                        <button type="submit" name="sub" class="btn btn-danger w-30"><a href="view.php" class="text-decoration-none text-light">Back</a> </button>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <small>&copy; <?php echo "$uname"; ?></small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>