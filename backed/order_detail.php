<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$OrDetID  = $_GET["ID"];
//2. query ข้อมูลจากตาราง:

$sql = "SELECT * FROM product as p INNER JOIN orderdetails as od ON (p.ProID=od.ProID) 
INNER JOIN `order` as o  ON (o.OrderID = od.OrderID)                       
INNER JOIN customer as c  ON (o.CustomerID = c.CustomerID)
INNER JOIN shipper as s  ON (s.ShipperID = o.ShipperID)                          
WHERE od.OrDetID  = '".$OrDetID."'ORDER BY o.CustomerID asc" or die("Error:" . mysqli_error($con));

$result2 = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
$row = mysqli_fetch_array($result2);
extract($row);

?>
<div class="container">
  <div class="row">
    <form name="addproduct" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-9">         
          <p> ชื่อสินค้า : <?php echo $ProName; ?></p>
          <p> ภาพสินค้า : <img src="Picture/<?php echo $row['Picture']; ?>" width="300px"></p>              
          <p> ยอดคงเหลือ : <?php echo $Stock; ?> ชิ้น</p>
          <p>--------รายละเอียดคำสั่งซื้อ>--------</p>    
          <p> ราคาต่อคำสั่งซื้อ : <?php echo "<td>" .number_format($row["OrDPrice"]-$row["OrDDiscount"],2) .  "</td> "; ?> บาท</p>  
          <p> จำนวนสินค้าที่สั่ง : <?php echo $Quantity; ?> ชิ้น</p>  
          <p> ผู้สั่งสินค้า : <?php echo $Name; ?></p>
          <p> ที่อยู่ : <?php echo $Address; ?></p>
          <p> รหัสไปรษณี : <?php echo $PostalCode; ?></p>
          <p> เบอร์โทรศัพท์ : <?php echo $Phone; ?></p> 
          <p> ขนส่ง : <?php echo $ComName; ?></p> 
        </div>
      </div>

    </form>
  </div>
</div>
<?php
    echo "<td><a href='order.php?act=confirm&ID=$row[9]' onclick=\"return confirm('ต้องการยืนยันคำสั่งซื้อ? !!!')\"class='btn btn-success'>ยืนยัน</a></td> ";
    //ลบข้อมูล
    echo "<td><a href='order.php?act=cancel&ID=$row[9]' onclick=\"return confirm('ต้องการยกเลิกคำสั่งซื้อ? !!!')\" class='btn btn-danger btn-xs'>ยกเลิก</a></td> ";

?>
