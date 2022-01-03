<?php
include('condb.php');

$CatName = $_POST['CatName'];

$sql ="INSERT INTO category(CatName) VALUES ('$CatName')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='category.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='category.php'; ";
      echo "</script>";
    }
?>