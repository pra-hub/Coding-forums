<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    <title>iDiscuss - coding forums </title>
  </head>
  <body>
<?php require 'partials/_dbconnect.php'?>
<?php require 'partials/_header.php'?>

<?php
$error = false;
$showMsg = false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=="POST"){
  $user = $_POST['contact_name'];
  $email = $_POST['contact_email'];
  $pass = $_POST['contact_password'];
  $desc = $_POST['contact_desc'];

  $required = array($user,$email,$pass,$desc);
          foreach($required as $field){
            if(empty($field)){
              $error = true;
            }
          }

      if($error){
        $error= "All field required";
      }else{
          $sql = "INSERT INTO contact(contact_user_name,contact_user_email,contact_user_pass,contact_user_desc)VALUES('$user','$email','$pass','$desc')";
          $result = mysqli_query($conn,$sql);
          if($result){
            $showMsg = "Form submitted successfully";
          }else{
            $error = "Sorry having some issue";
          }
      }
  }
  
  if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry !</strong> '.$error.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
  if($showMsg){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sorry !</strong> '.$showMsg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
?>



<div class="container my-3" style="min-height:80vh;">
<form action="<?php echo $_SERVER['REQUEST_URI']?>" method ="POST">
  <h2 class="text-center">Contact us</h2>
<div class="mb-3"id="user_div">
    <label for="contact_name" class="form-label">User name</label>
    <input type="text" class="form-control" maxLength="30"  id="contact_name" name="contact_name" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="contact_email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="contact_email" maxLength="30" name="contact_email" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="contact_password" class="form-label">Password</label>
    <input type="password" class="form-control" id="contact_password" maxLength="30" name="contact_password">
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="contact_desc" name="contact_desc" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Your concern here</label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
<?php require 'partials/_footer.php'?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="js/app.js"></script>    
  </body>
</html>