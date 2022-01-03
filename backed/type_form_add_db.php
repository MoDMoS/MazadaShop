<?php
include('condb.php');

$SCatIDName = $_POST['SCatIDName'];
$CatID = $_POST['CatID'];

$sql ="INSERT INTO sub_category(SCatIDName,CatID) VALUES ('$SCatIDName','$CatID')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='type.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='type.php'; ";
      echo "</script>";
    }
?>