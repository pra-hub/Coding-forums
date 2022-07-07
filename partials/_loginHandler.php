<?php
$showError="false";
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    include '_dbconnect.php';
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    $sql = "SELECT * FROM `users`WHERE user_email = '$loginEmail'";
    $result = mysqli_query($conn,$sql);
    
    $numOfUser = mysqli_num_rows($result);
    if($numOfUser==1){
        $db = mysqli_fetch_assoc($result);
        if(password_verify($loginPassword,$db['user_pass'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_id']=$db['user_id'];
            $_SESSION['user_name']=$db['user_name'];
            header("Location: /project2/index.php?loginsuccess=true");
            exit();
        }
        else{
            $showError= "Unable to login";
        }
    }
}
header("Location: /project2/index.php?loginsuccess=false&loginerror=$showError");
?>