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

    <?php
    $thread_idUrl = $_GET['thread_idUrl'];
    $sql = "SELECT * FROM `threads` WHERE `threads_id`=$thread_idUrl";
    $result = mysqli_query($conn,$sql);
        while($rows = mysqli_fetch_assoc($result)){
            $threads_title = $rows['threads_title'];
            $threads_description = $rows['threads_description'];
            $threads_user_id = $rows['threads_user_id'];
            $sql2 = "SELECT `user_name` FROM `users` WHERE user_id ='$threads_user_id'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $postedBy = $row2['user_name'];
         }
    ?>

        <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $comment_content = $_POST['comment'];
        $comment_content = str_replace("<","&lt;",$comment_content);
        $comment_content = str_replace(">","&gt;",$comment_content);
        $user_id = $_POST['user_id'];
        $sql ="INSERT INTO `comments` ( `comment_content`, `comments_threads_id`, `comment_by`, `comment_time`) VALUES ('$comment_content', '$thread_idUrl', '$user_id', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        $showAlert=true;
    }    
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success ! </strong> Your comment has been added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <!-- Category container starts from here -->
    <div class="container my-4">
        <div class="jumbotron bg-dark bg-gradient text-light p-4">
            <h1 class="display-4 "><?php echo $threads_title;?></h1>
            <p class="lead"><?php echo $threads_description;?></p>
            <hr class="my-4">
            <p>This is peer to peer forum .No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all times.</p>
            <p class="p-2">Posted by:- <em class="text-capitalize text-success"><?php echo $postedBy;?></em></p>
        </div>
    </div>
    </div>
<?php
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    $username = $_SESSION['user_name'];
    echo '<div class="container my-2 py-2 border border-4 rounded">
        <h2 class="py-2">Post a Comment</h2>
        <form action="'. $_SERVER['REQUEST_URI'] . '" method="POST">

            <label for="description">Post your comment here</label>
            <div class="form-floating my-2">
                <textarea class="form-control" placeholder="Leave a comment here" id="comment"
                    name="comment"></textarea>
                    <input type="hidden" name="user_id" value=" '. $_SESSION['user_id'].' ">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
}
    else{
        echo ' <div class="container my-4  py-2 border border-4 rounded">
        <h2 class="py-2">Post a Comment</h2>
        <p class="lead">You are not logged in yet. Login to post a comment. </p></div>';
    }
?>
    <div class="container">
        <h2>Discussion</h2>

<?php
    $url_id = $_GET['thread_idUrl'];
    $sql = "SELECT * FROM `comments` WHERE `comments_threads_id`=$url_id";
    $result = mysqli_query($conn,$sql);
    $noResult=true;
    while($rows = mysqli_fetch_assoc($result)){
        $noResult=false;
    $comment_id = $rows['comments_id'];
    $comment_content = $rows['comment_content'];
    $comment_time= $rows['comment_time'];
    $thread_user_id = $rows['comment_by'];

    $sql2 = "SELECT `user_name` FROM `users` WHERE user_id ='$thread_user_id'";
    $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
 echo '<hr class="my-2">
            <div class="d-flex mx-3 p-3">
                <div class="flex-shrink-0">
                    <img src="img/userDefault.png" width="50vw" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                <p class="text-bold"><b><a href="profile.php?profileId='.$thread_user_id.'">'.$row2['user_name'].'  </a></b>at '.$comment_time.'</p>
                    '.$comment_content.'
            </div>
        </div>';
    }        
    
    if($noResult){
        echo '
        <div class="jumbotron jumbotron-fluid bg-secondary bg-gradient text-light p-2 m-2">
        <div class="container">
             <h2 class="dislpay-4 text-dark">No Comment found</h2>
                <p class="lead">Be the first one to comment.</p>
            </div>
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