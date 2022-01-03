<?php
include('condb.php');

$ComName = $_POST['ComName'];
$Phone = $_POST['Phone'];

$sql ="INSERT INTO shipper(ComName,Phone) VALUES ('$ComName','$Phone')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='shipper.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='shipper.php'; ";
      echo "</script>";
    }
?>