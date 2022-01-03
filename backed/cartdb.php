<?php

require 'condb.php';

if(isset($_POST['add-btn'])){
	$query = mysqli_query($con,"SELECT c.*,p.* FROM cart as c INNER JOIN product as p ON c.ProID = p.ProID AND c.CustomerID = $CustomerID ORDER BY c.CartID AND p.ProID asc");
    $ProID = $_POST['ProID'];
    $CustomerID = $_POST['CustomerID'];
    while($row = mysqli_fetch_array($query)){
        if($ProID == $row['ProID']){
            $int = $row['QuantityC'] + 1;
            $sql3 = "UPDATE cart SET QuantityC = $int WHERE ProID=$ProID and CustomerID=$CustomerID";
            mysqli_query($con,$sql3);
            $check = true;
        }
    }
    if($check){
        header('location: cart.php');
    }
    else{
        $qty = 1;
        mysqli_query($con, "INSERT INTO cart (`CartID`, `QuantityC`, `ProID`, `CustomerID`) VALUES (null,'$qty','$ProID','$CustomerID')");
        $_SESSION['ProID'] = $ProID;
        header('location: cart.php');
    }
}
if(isset($_GET['ID'])){
    $CustomerID = $_SESSION['CustomerID'];
    $ID = $_GET['ID'];
    
    $sql2 = "DELETE FROM cart WHERE CustomerID = $CustomerID AND CartID = $ID";
    mysqli_query($con,$sql2);
    header('location: cart.php');
}
if(isset($_POST['update-btn'])){
    $amount_array = $_POST['amount'];
    $CustomerID = $_SESSION['CustomerID'];
    $ProID_array = $_POST['proID'];
    $i = 0;
    foreach ($ProID_array as $ProID => $proID) {
        $ProIDa[$i] = $proID;
        $i++;
    }
    $i = 0;
    foreach ($amount_array as $ProID => $amount) {
        $qty2 = $amount;
        $int = intval($qty2);
        $sql3 = "UPDATE cart SET QuantityC = $int WHERE ProID=$ProIDa[$i] and CustomerID=$CustomerID";
        mysqli_query($con,$sql3);
        $i++;
    }
    
    
    header('location: cart.php');
}
