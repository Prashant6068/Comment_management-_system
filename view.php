<?php
include("./includes/connection.php");
session_start();
$name=$_SESSION['uname'];
$sel=mysqli_query($conn,"select * from posts where user_name !='$name' order by user_id");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="./css//style.css"/>
<title>View</title>
<style>
  
 
    .image img{
     width: 200px;
  
   height: 200px;
    object-fit: cover;
   
    
        }
    .container{
        margin-top: 70px;
        display: flex;
        overflow-x: scroll;
        justify-content: space-around;
  

 
    }
    body{
        
        display: flex;
        align-items: center;
        justify-content:center;
        background: white !important;
        width: 100%;
        height: 90vh;
        background-color: #f5f9ee !important;
    
    }
    h5{
        text-transform: uppercase;
        letter-spacing: 1px;
        color: black !important;
        text-shadow: 1px 2px #394a51;
       
    }
    .card{
      width: 300px;
      height: 450px;
    display: flex;
    overflow: hidden;
    margin-top: 50px;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border-radius: 70px !important;
  


    }

    body::-webkit-scrollbar{
        display: none;
    }
    p {
        text-transform: uppercase !important;
        color: #606470;
        /* font-style: italic; */
        font-size: smaller;
        font-weight: bolder;
        /* text-shadow: ; */
        text-shadow: 0px 0.1px #394a51;

    }


    .cardbody{
        display: flex;
        margin-left: 750px;
    
    }
    span{
text-decoration: underline;
    }
button .rounded-square{
            border-radius: 50% !important;
           
        }
   
</style>


 <body class="cardbody">
 <?php include("./includes/nav.php")?>
 <?php
 while($arr=mysqli_fetch_assoc($sel)){
     
     $pid=$arr['id'];

    $com=mysqli_query($conn,"select * from commentbox where post_id=$pid");
    
     ?>
   
 <div class="col-sm-4">
  <div class="card ">
    <div class="image">
    
      <img class="card-img-top im" src="<?php echo $arr['img_path']?>" alt="Image">
      
    </div><br>
    <div class="card-inner">
      <div class="header">
      <p><span>Title :  </span><?php echo $arr['title'].". <br><br><span>Caption : </span></b>".$arr['description']?></p>
      <?php
     while($ar1=mysqli_fetch_assoc($com)){
         ?>
        
          <p class="c1">
        <b ><?php echo $ar1['user_name'].": </b>".$ar1['comment']?></p>
    
     <?php
     }
      ?>
        <!-- <h3>Sub-Head</h2> -->
        <h5 class="text-shadow text-danger">Upload by: <?php echo $arr["user_name"]?></h5>
     
        <a href="comment.php?que=<?php echo $arr['id']?>" class="btn btn-block btn-dark rounded-circle ">Comment</a>
    </div>
    <div class="content">
   
    </div>
      </div>
  </div>

    </div>
<?php
 }
 
 ?> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</body>
</html>