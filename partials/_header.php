<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/project2">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/project2">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/project2/about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        
        $sql = "SELECT categories_name, categories_id FROM categories LIMIT 3";
        $result = mysqli_query($conn,$sql); 
        while($row = mysqli_fetch_assoc($result)){
          echo'
          <li><a class="dropdown-item" href="threadlist.php?category_idUrl='.$row['categories_id'].'">'.$row['categories_name'].'</a></li>
          ';
        }
         
          echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
    <form class="d-flex" action="search.php" method="GET">
      <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit"  >Search</button>
    </form>';
    
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
      $username = $_SESSION['user_name'];
    echo'
    <div class="mx-2">
    <a href="/project2/profile.php?'.$_SESSION['user_id'].'" class="btn btn-outline-success "id="textChange">Welcome '.$username.'</a>
    <a href="partials/_logout.php" class="btn btn-outline-success ">Logout</a>';
  }else{
    echo'
        <div class="mx-2">
        <div class="btn btn-outline-success "data-bs-toggle="modal" data-bs-target="#loginModal">Login</div>
        <div class="btn btn-outline-success "data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</div>';
      }
 echo '
    </div>
  </div>
</div>
</nav>';
include '_loginModal.php';
include '_signupModal.php';
if(isset($_GET['signupsuccess'])&& ($_GET['signupsuccess']=='true')){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success ! </strong> Your account has been created successfully. You can login now. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if(isset($_GET['error'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry ! </strong>'.$_GET['error'].' . 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=='true'){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success ! </strong> You are logged in successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if(isset($_GET['loginerror'])){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry ! </strong> Unable to login . 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
