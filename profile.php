<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>iDiscuss - coding forums </title>
    <style>
    .myCont {
        min-height: 100vh;
    }
    .myCont img['alt']{
height:20vh;
width:20vw;
        }
    </style>
</head>

<body>
    <?php require 'partials/_dbconnect.php'?>
    <?php require 'partials/_header.php'?>

    <?php
    if(isset($_GET['profileId'])){

        $userId=  $_GET['profileId'];
        $sql = "SELECT * FROM users WHERE user_id = $userId";
        $result = mysqli_query($conn,$sql);
        
        while( $rows = mysqli_fetch_assoc($result)){
            $user_name = $rows['user_name'];
            $user_email = $rows['user_email'];
        };
    }
    ?>
<?php
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = $id";
$result = mysqli_query($conn,$sql);

while( $rows = mysqli_fetch_assoc($result)){
    $user_name = $rows['user_name'];
    $user_email = $rows['user_email'];
   };

?>
    <div class="container my-2">
    <form action = "partials/_profileHandler.php" method ="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <img src="..." class="card-img-top" alt="Choose a img for upload">
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Edit your bio</label>
</div>
  <button type="submit" class="btn btn-primary">Edit profile</button>
</form>
    </div>

    <div class="container  myCont my-2">
        <div class="card" style="width: 48rem; height:30rem;">
            <img src="..." class="card-img-top" alt="user" >
            <div class="card-body">
                <h5 class="card-title">Welcome :- <?php echo $user_name;?></h5>
                <p class="card-text"><?php echo $user_email;?></p>
            </div>
        </div>
    </div>

    <?php require 'partials/_footer.php'?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="js/app.js"></script>
</body>

</html>