<?php
include("./includes/connection.php");
session_start();
$mail = $_SESSION["email"];
// $uname= $_SESSION["uname"];
// $name=$_SESSION['uname']; 


if (isset($_POST["sub"])) {
    $title = $_POST["title"];
    $descrip = $_POST["desc"];
    $tmp = $_FILES["att"]["tmp_name"];
    $fname = $_FILES["att"]["name"];
    $dest = "uploads/";
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $c = scandir($dest);
    $cnt = count($c) - 1;
    $fn = $mail . $cnt . "." . $ext;
    if (move_uploaded_file($tmp, $dest . $fn)) {
        $sel = mysqli_query($conn, "select * from users where email='$mail'");
        $arr = mysqli_fetch_assoc($sel);
        $uid = $arr['id'];
        $uname2 = $arr['name'];
        $imgpath = $dest . $fn;
        if (mysqli_query($conn, "insert into posts(user_id,user_name,img_path,title,description) values
     ($uid,'$uname2','$imgpath','$title','$descrip')")) {
            header("location:view.php");
        } else {
            echo "not inserted";
        }
    } else {
        echo "not uploaded";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add post</title>
    <link rel="stylesheet" type="text/css" href="./css//boostrap.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Courgette&family=Poppins:ital,wght@0,100;0,200;1,100&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Baloo 2&family=Roboto:wght@300&display=swap");

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Baloo 2", cursive;
            /* background-color: black !important; */
            background-color: #f5f9ee !important;
        }

        .card {
            width: 40%;


        }

        .container {
            margin-top: 80px;
            background-color: white;
            background-color: #f5f9ee !important;

        }

        .form-group input {
            height: 40px;
            margin-right: 18px;
            border: none;
            outline: none;
            padding: 0 15px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 3px 3px 8px #aaaaaa, 5px 5px 10px #ffffff;
        }

        .form-group input:focus {
            box-shadow: inset 5px 5px 10px #aaaaaa, inset 5px 5px #ffffff;
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

        /*  */
    </style>
</head>

<body>
    <!-- <div class="container "> -->
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="card  my-auto shadow">
                <div class="card-header text-center bg-dark text-white">
                    <h2>Add Post</h2>
                </div>
                <div class="card-body mt-8">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Title">Title</label>

                            <input type="text" id="title" class="form-control" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="att" class="form-control">
                        </div>

                        <button type="submit" name="sub" class="btn btn-dark w-100">Submit</button><br><br>
                       

                    </form>
                </div>
                <div class="card-footer text-right">
                    
                    <small>&copy; <?php echo "$mail"; ?></small>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>