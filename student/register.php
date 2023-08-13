<?php
require_once("../dbcon.php");
session_start();

if(isset($_SESSION["student_login"])){
    header("location:index.php");
}
if(isset($_POST['student_register_btn'])){

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $roll = $_POST['roll'];
   $reg = $_POST['reg'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $password_hash = password_hash($password,PASSWORD_DEFAULT);

   $input_errors = array();

   if(empty("$fname")){
    $input_errors['fname'] = "fast name is required";
   }
   
   if(empty("$lname")){
    $input_errors['lname'] = "last name is required";
   }
   
   if(empty("$roll")){
    $input_errors['roll'] = "roll is required";
   }
   
   if(empty("$reg")){
    $input_errors['reg'] = "reg. no is required";
   }
   
   if(empty("$phone")){
    $input_errors['phone'] = "phone is required";
   }
   
   if(empty("$email")){
    $input_errors['email'] = "email is required";
   }
   
   if(empty("$username")){
    $input_errors['username'] = "user name is required";
   }
   
   if(empty("$password")){
    $input_errors['password'] = "password is required";
   }

   if(count($input_errors) == 0){

        $email_check = mysqli_query($con,"SELECT * FROM `students` WHERE `email` = '$email'");
        $email_num_rows = mysqli_num_rows($email_check);     

        if($email_num_rows == 0){

            $username_check = mysqli_query($con,"SELECT * FROM `students` WHERE `username` = '$username'");
            $username_num_rows = mysqli_num_rows($username_check);  
            if($username_num_rows == 0){
                
            $phone_check = mysqli_query($con,"SELECT * FROM `students` WHERE `phone` = '$phone'");
            $phone_num_rows = mysqli_num_rows($phone_check);  

            if($phone_num_rows == 0){

                $pass_lenth_check = strlen($password);
               if($pass_lenth_check >=6){
               
                    $insert_query = mysqli_query($con,"INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `phone`, `email`, `username`,`status`, `password`) 
                    VALUES ('$fname','$lname','$roll','$reg','$phone','$email','$username','0','$password_hash')");
                    if($insert_query){
                        $success = "Registration successfuly";
                    }else{
                        $error = "something went wrong";
                    }
               }else{
                $pass_lenth = "password must be 6 char or more";
               }
            }else{
                $phone_exists = "phone numbar already exits";
            }
                
            }else{
                $username_exists = "user name already exits";
            }
            
        }else{
            $email_exists = "email already exits";
        }
        //print_r($username_num_rows);

        
   }
   
   
}


?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>
            <?php 
                if(isset($success)){ ?>

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $success ?>
                    </div>

        <?php } ?>
        <?php 
                if(isset($error)){ ?>

                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $error ?>
                    </div>

        <?php } ?>
        <?php 
                if(isset($email_exists)){ ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $email_exists ?>
                    </div>

        <?php } ?>
        <?php 
                if(isset($username_exists)){ ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $username_exists ?>
                    </div>

        <?php } ?>
        <?php 
                if(isset($phone_exists)){ ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $phone_exists ?>
                    </div>

        <?php } ?>
        <?php 
                if(isset($pass_lenth)){ ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $pass_lenth ?>
                    </div>

        <?php } ?>
            
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF']?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" value="<?= isset($fname) ? $fname : '' ?>" placeholder="Fast Name">
                                <i class="fa fa-user"></i>
                            </span>
                               <?php 
                                    if(isset($input_errors['fname'])){
                                        echo '<span class="text-danger">'.$input_errors['fname'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" value="<?= isset($lname) ? $lname : '' ?>" placeholder="Last Name">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['lname'])){
                                        echo '<span class="text-danger">'.$input_errors['lname'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" value="<?= isset($roll) ? $roll : '' ?>" placeholder="enter roll">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['roll'])){
                                        echo '<span class="text-danger">'.$input_errors['roll'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" value="<?= isset($reg) ? $reg : '' ?>" placeholder="reg. No">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['reg'])){
                                        echo '<span class="text-danger">'.$input_errors['reg'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone" value="<?= isset($phone) ? $phone : '' ?>" placeholder="01*****">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['phone'])){
                                        echo '<span class="text-danger">'.$input_errors['phone'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" value="<?= isset($email) ? $email : '' ?>" placeholder="email">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['email'])){
                                        echo '<span class="text-danger">'.$input_errors['email'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" value="<?= isset($username) ? $username : '' ?>" placeholder="user name">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['username'])){
                                        echo '<span class="text-danger">'.$input_errors['username'].'</span>';
                                    }
                               ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" placeholder="password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                                    if(isset($input_errors['password'])){
                                        echo '<span class="text-danger">'.$input_errors['password'].'</span>';
                                    }
                               ?>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" name="student_register_btn" class="btn btn-primary btn-block" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
