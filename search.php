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
<style>
.container {
    min-height: 100vh;
}
</style>

<body>
    <?php require 'partials/_dbconnect.php'?>
    <?php require 'partials/_header.php'?>

    <div class="container my-3">
        <h1 class="text-center">Search Result for <em> "<?php echo $_GET['query'];?>"</em></h1>

<?php
    $query = $_GET['query'];
    $sql = "SELECT * FROM threads WHERE MATCH (threads_title,threads_description) against ('$query');";
    $result = mysqli_query($conn,$sql); 

    $num = mysqli_num_rows($result);
    if($num>0){
    while($row = mysqli_fetch_assoc($result)){

            $searchTitle = $row['threads_title'];
            $searchDescription = $row['threads_description'];
            $threads_id =$row['threads_id'];
            $url = "thread.php?thread_idUrl=" . $threads_id;
            echo'
            <div class="result my-2">
            <h2 class="text-center"><a href="' . $url .'" class="text-dark">'.$searchTitle.'</a></h2>
            <p class="text-center">'.$searchDescription.'</p>
            </div>   
            ';
        }
    }
        else{
            echo '<div class="jumbotron bg-dark bg-gradient text-light p-4">
            <h1 class="display-4 ">No result found</h1>
            <p><ul>Suggestions:
            
           <li> Try different keywords.</li>
           <li> Make sure that all words are spelled correctly.</li>
           <li> Try more general keywords.</li>
           
           </ul></p>
           </div>';
                 }   
    
    ?>
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