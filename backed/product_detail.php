<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$ProID = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT p.*,t.SCatIDName FROM product as p
INNER JOIN sub_category as t ON p.SCatID = t.SCatID
WHERE p.ProID = '$ProID.'";

$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

// SELECT * FROM  sub_category NATURAL JOIN category
?>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อสินค้า : <?php echo $ProName; ?></p> 
            <p> ภาพสินค้า : <img src="Picture/<?php echo $row['Picture'];?>" width="300px"></p>    
            <!-- <p> หมวดหมู่หลัก : <?php echo $row["CatName"];?></p> -->
            <p> หมวดหมู่ : <?php echo $row["SCatIDName"]; ?></p>
            <p> ราคาสินค้า : <?php echo number_format($Price,2); ?> บาท</p>
            <p> ส่วนลด : <?php echo number_format($Discount,2); ?> บาท</p>
            <p> ยอดคงเหลือ : <?php echo $Stock; ?> ชิ้น</p>
            <p> รายละเอียด : <?php echo $ProDe; ?></p>                                   
          </div>
        </div>                  
        
      </form>
    </div>
  </div>