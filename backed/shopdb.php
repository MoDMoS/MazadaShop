<?php
session_start();
require 'condb.php';
$errors = array();
$username = "";
$email = "";

if(isset($_POST['loginShop-btn'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    if(empty($username)){
        $errors['username'] = 'Username required';
    }
    if(empty($password)){
        $errors['password'] = 'Password required';
    }

    if(count($errors) === 0 ){
        $sql = "SELECT * FROM shopowner WHERE OwEmail=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $userCount = $result->num_rows;

        if($userCount > 0){
            if($password===$user['OwPassword']){
                //login
                $_SESSION['OwID'] = $user['OwID'];
                $_SESSION['OwName'] = $user['OwName'];
                $_SESSION['OwPassword'] = $user['OwPassword'];
                $_SESSION['OwEmail'] = $user['OwEmail'];
                //message
                $_SESSION['message'] = "You are now logged in!";
                $_SESSION['alert-class'] = "alert-success";
                header('location: backed/index.php');
                exit();
            }
            else{   
                $errors['login fail'] = "รหัสผ่านผิดพลาด กรุณากรอกใหม่";
            }
        }
        else{   
            $errors['login fail'] = "อีเมล์ผิดพลาด กรุณากรอกใหม่";
        }
    }
}
if(isset($_POST['registerShop-btn'])){
    $name =$_POST['name'];
    $password =$_POST['password'];
    $passwordConf =$_POST['passwordConf'];
    $email =$_POST['email'];
    if(empty($name)){
        $errors['name'] = 'Name required';
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email address is invalid';
    }
    if(empty($email)){
        $errors['email'] = 'Email required';
    }
    if(empty($password)){
        $errors['password'] = 'Password required';
    }
    if(empty($passwordConf)){
        $errors['passwordConf'] = 'Password Confiem required';
    }
    if($password !== $passwordConf){
        $errors['password'] = 'The two password do not match ';
    }

    $emailQuery = "SELECT * FROM shopowner WHERE OwEmail=? LIMIT 1";
    $stmt = $con->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if($userCount > 0){
        $errors['emaill'] = "Email already exists";
    }
    if(count($errors) === 0){

        mysqli_query($con,"INSERT INTO `shopowner`(`OwPassword`, `OwName`, `OwEmail`) VALUES (\"$password\",\"$name\",\"$email\")");
            $user_id = $con->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            //message
            $_SESSION['message'] = "Success";
            $_SESSION['alert-class'] = "alert-success";

            header('location: loginshop.php');
            exit();

    }
}