<?php

session_start();

require 'condb.php';

$errors = array();
$username = "";
$email = "";

if(isset($_POST['loginCus-btn'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    if(empty($username)){
        $errors['username'] = 'Username required';
    }
    if(empty($password)){
        $errors['password'] = 'Password required';
    }

    if(count($errors) === 0 ){
        $sql = "SELECT * FROM customer WHERE Email=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($password===$user['Password']){
            //login
            $_SESSION['CustomerID'] = $user['CustomerID'];
            $_SESSION['Name'] = $user['Name'];
            $_SESSION['Password'] = $user['Password'];
            $_SESSION['Email'] = $user['Email'];
            $_SESSION['Address'] = $user['Address'];
            $_SESSION['PostalCode'] = $user['PostalCode'];
            $_SESSION['Phone'] = $user['Phone'];
            //message
            
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";

            header('location: index.php');
            exit();
        }else{
            echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";           
            echo "</script>";
            $errors['login fail'] = "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่";
        }
    }
}
if(isset($_POST['registerCus-btn'])){
    $name =$_POST['name'];
    $password =$_POST['password'];
    $passwordConf =$_POST['passwordConf'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $postal =$_POST['postalcode'];
    $tel =$_POST['tel'];
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
    if(empty($address)){
        $errors['address'] = 'Address required';
    }
    if(empty($postal)){
        $errors['postalcode'] = 'postalcode required';
    }
    if(empty($tel)){
        $errors['tel'] = 'Tel. required';
    }
    if($password !== $passwordConf){
        $errors['password'] = 'The two password do not match ';
    }

    $emailQuery = "SELECT * FROM customer WHERE Email=? LIMIT 1";
    $stmt = $con->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if($userCount > 0){
        $errors['emaill'] = "Email already exists";
    }
    if(count($errors) === 0){

        mysqli_query($con,"INSERT INTO customer(`Name`, `Password`, `Email`, `Address`, `PostalCode`, `Phone`) VALUES (\"$name\",\"$password\",\"$email\",\"$address\",\"$postal\",\"$tel\")");
            $user_id = $con->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            $_SESSION['postal'] = $postal;
            $_SESSION['tel'] = $tel;
            //message
            $_SESSION['message'] = "Success";
            $_SESSION['alert-class'] = "alert-success";

            header('location: loginCus.php');
            exit();

    }
}