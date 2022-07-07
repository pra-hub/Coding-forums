<?php
$showError="false";
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){

    // Connecting to database
    include '_dbconnect.php';
    $signupUsername = $_POST['signupUsername'];
    $signupEmail = $_POST['signupEmail'];
    $signupPassword = $_POST['signupPassword'];
    $signupCpassword = $_POST['signupCpassword'];

    $required = array($signupUsername,$signupEmail,$signupPassword,$signupCpassword);
          foreach($required as $field){
            if(empty($field)){
              $error = true;
            }
          }

if($error){
    $showError = "All field required";
}  else{

    // Checking whether email exists or not
    $existSql = "SELECT * FROM `users` WHERE `user_email` = '$signupEmail'";
    $result = mysqli_query($conn,$existSql);
    $numUsers = mysqli_num_rows($result);
    if($numUsers>0){
        $showError = 'Email already in use';
    }else{
        if($signupPassword==$signupCpassword){

            $hash = password_hash($signupPassword,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users`(`user_name`,`user_email`,`user_pass`)VALUES('$signupUsername','$signupEmail','$hash')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    header("Location: /project2/index.php?signupsuccess=true");
                    exit();
                }
                
            }else{
                $showError= 'Password do not matched';
            }
        }
    }
}
    header("Location: /project2/index.php?signupsuccess=false&error=$showError");

?>