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
        $userCount = $result->num_rows;

        if($userCount > 0){
            if($password===$user['Password']){
                //login
                $_SESSION['CustomerID'] = $user['CustomerID'];
                $_SESSION['Name'] = $user['Name'];
                $_SESSION['Password'] = $user['Password'];
                $_SESSION['Email'] = $user['Email'];
                $_SESSION['Address'] = $user['Address'];
                $_SESSION['PostalCode'] = $user['PostalCode'];
                $_SESSION['Phone'] = $user['Phone'];
                $_SESSION['BDay'] = $user['BDay'];
                //message
                
                $_SESSION['message'] = "You are now logged in!";
                $_SESSION['alert-class'] = "alert-success";

                header('location: index.php');
                exit();
            }else{
                $errors['login fail'] = "รหัสผ่านผิดพลาด กรุณากรอกใหม่";
            }
        }else{
            $errors['login fail'] = "อีเมล์ผิดพลาด กรุณากรอกใหม่";
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
    $Bday =$_POST['date'];
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
    if(empty($Bday)){
        $errors['Bday'] = 'Birth day required';
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

        mysqli_query($con,"INSERT INTO customer(`Name`, `Password`, `Email`, `Address`, `PostalCode`, `Phone`, `BDay`) VALUES (\"$name\",\"$password\",\"$email\",\"$address\",\"$postal\",\"$tel\",\"$Bday\")");

        header('location: loginCus.php');
        exit();

    }
}
if(isset($_POST['account-btn'])){
    header('location: edit.php');
    exit();
}
if(isset($_POST['edit-btn'])){
    $CustomerID =$_SESSION['CustomerID'];
    $nameE =$_POST['nameE'];
    $passwordE =$_POST['passwordE'];
    $passwordConfE =$_POST['passwordConfE'];
    $email = $_POST['email'];
    $emailE =$_POST['emailE'];
    $addressE =$_POST['addressE'];
    $postalE =$_POST['postalcodeE'];
    $telE =$_POST['telE'];
    $BdayE =$_POST['dateE'];
    if(empty($nameE)){
        $errors['name'] = 'Name required';
    }
    if(!filter_var($emailE,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email address is invalid';
    }
    if(empty($emailE)){
        $errors['email'] = 'Email required';
    }
    if(empty($passwordE)){
        $errors['password'] = 'Password required';
    }
    if(empty($passwordConfE)){
        $errors['passwordConf'] = 'Password Confiem required';
    }
    if(empty($addressE)){
        $errors['address'] = 'Address required';
    }
    if(empty($postalE)){
        $errors['postalcode'] = 'postalcode required';
    }
    if(empty($telE)){
        $errors['tel'] = 'Tel. required';
    }
    if(empty($BdayE)){
        $errors['Bday'] = 'Birth day required';
    }
    if($passwordE !== $passwordConfE){
        $errors['password'] = 'The two password do not match ';
    }
    $emailQuery = "SELECT * FROM customer WHERE Email=? LIMIT 1";
    $stmt = $con->prepare($emailQuery);
    $stmt->bind_param('s',$emailE);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if($email === $emailE){
        if(count($errors) === 0){
            mysqli_query($con,"UPDATE `customer` SET `Name`='$nameE',`Password`='$passwordE',`Email`='$email',`Address`='$addressE',`PostalCode`='$postalE',`Phone`='$telE',`BDay`='$BdayE' WHERE `customer`.`CustomerID` = '$CustomerID'");
            $_SESSION['Name'] = $nameE;
            $_SESSION['Password'] = $passwordE;
            $_SESSION['Email'] = $emailE;
            $_SESSION['Address'] = $addressE;
            $_SESSION['Postal'] = $postalE;
            $_SESSION['Tel'] = $telE;
            $_SESSION['BDay'] = $BdayE;

            header('location: account.php');
            exit();
        }
    }
    if($email !== $emailE){
        if($userCount > 0){
            $errors['emaill'] = "Email already exists";
        }
        if(count($errors) === 0){
            mysqli_query($con,"UPDATE `customer` SET `Name`='$nameE',`Password`='$passwordE',`Email`='$emailE',`Address`='$addressE',`PostalCode`='$postalE',`Phone`='$telE',`BDay`='$BdayE' WHERE `customer`.`CustomerID` = '$CustomerID'");
            $_SESSION['Name'] = $nameE;
            $_SESSION['Password'] = $passwordE;
            $_SESSION['Email'] = $emailE;
            $_SESSION['Address'] = $addressE;
            $_SESSION['Postal'] = $postalE;
            $_SESSION['Tel'] = $telE;
            $_SESSION['BDay'] = $BdayE;

            header('location: account.php');
            exit();
        }
    }
}