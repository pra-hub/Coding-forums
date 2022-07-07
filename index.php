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
</head>

<body>
    <?php require 'partials/_dbconnect.php'?>
    <?php require 'partials/_header.php'?>

    <!-- Carousel starts from here --> 
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carouselHd1.jpg" class="d-block w-100 carousel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carouselHd2.jpg" class="d-block w-100 carousel" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carouselHd3.jpg" class="d-block w-100 carousel" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container starts from here -->
    <div class="container my-3">
        <h2 class="text-center my-4">iDiscuss - coding forums</h2>
        <div class="row my-4">
<?php
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn,$sql);

while($rows = mysqli_fetch_assoc($result)){
    // replecate using while  loop  
    // echo $rows['categories_name'];
    $categoryId= $rows['categories_id'];
    $categoryName = $rows['categories_name'];
    $categoryDescription= $rows['categories_description'];
    $categoryImg = $rows['categories_image'];

    echo '
    <div class="col-md-4 my-2">
    <div class="card" style="width: 18rem;">
        <img src='.$categoryImg.' class="card-img-top cardImage" alt="...">
        <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?category_idUrl='.$categoryId.'">'.$categoryName.'</a></h5>
            <p class="card-text">'.substr($categoryDescription,0,90).'....</p>
            <a href="threadlist.php?category_idUrl='.$categoryId.'" class="btn btn-primary">Browse '.$categoryName.'</a>
        </div>
    </div>
</div>';

}

?>
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