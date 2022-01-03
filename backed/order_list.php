<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM product as p INNER JOIN orderdetails as od ON (p.ProID=od.ProID) 
INNER JOIN `order` as o  ON (o.OrderID = od.OrderID)                       
INNER JOIN shipper as s  ON (s.ShipperID = o.ShipperID)        
WHERE p.OwID = '".$_SESSION['OwID']."'
ORDER BY od.OrDetID asc" or die("Error:" . mysqli_error($con));
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

echo  ' <table class="table table-hover">';
  //หัวข้อตาราง
    echo "<tr>
      <td width='3%'>OrderID</td>
      <td width='3%'>OrDetID</td>
      <td width=30%>ชื่อ</td>
      <td width=3%>จำนวน</td>
      <td width=3%>ราคา</td>
      <td width=1%> </td>
      <td width=1%> </td>
      <td width=20%> </td>
    </tr>";
  while($row = mysqli_fetch_array($result) ) {
  echo "<tr>";
  echo "<td>" .$row["OrderID"].  "</td> ";	
    echo "<td>" .$row["OrDetID"].  "</td> ";	
    echo "<td>" .$row["ProName"].  "</td> ";
    echo "<td>" .$row["Quantity"].  "</td> ";
    echo "<td>" .number_format($row["OrDPrice"]-$row["OrDDiscount"],2) .  "</td> ";
    //รายละเอียด 
    echo "<td><a href='order.php?act=detail&ID=$row[9]' class='btn btn-info btn-xs'>รายละเอียด</a></td> ";
    echo "<td><a href='order.php?act=shipper&ID=$row[15]' class='btn btn-warning btn-xs'>".$row["ComName"]."</a></td> ";
    //แก้ไขข้อมูล 
    echo "<td>" .$row["Status"] .  "</td> ";
    //ลบข้อมูล
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>