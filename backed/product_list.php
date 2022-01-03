<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
// SELECT * FROM product as p INNER JOIN sub_category  as t ON p.SCatID=t.SCatID INNER JOIN shopowner  as o ON p.OwID =o.OwID    ORDER BY p.ProID DESC
$query = "
SELECT * FROM product as p 
INNER JOIN sub_category as t ON p.SCatID=t.SCatID 
WHERE p.OwID = '".$_SESSION['OwID']."'
ORDER BY p.ProID asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

echo  ' <table class="table table-hover">';
  //หัวข้อตาราง
    echo "<tr>
      <td width='3%'>ลำดับ</td>
      <td width=20%>หมวดหมู่สินค้า</td>
      <td width=30%>ชื่อ</td>
      <td width=3%>ราคา</td>
      <td width=25%> </td>
      <td width=1%> </td>
      <td width=1%> </td>
      <td width=1%> </td>
    </tr>";
  while($row = mysqli_fetch_array($result) ) {
  echo "<tr>";
    echo "<td>" .$row["ProID"] .  "</td> ";
    echo "<td>" .$row["SCatIDName"] .  "</td> ";
    echo "<td>" .$row["ProName"] .  "</td> ";
    echo "<td>" .number_format($row["Price"]-$row["Discount"],2) .  "</td> ";
    echo "<td align=center>"."<img src='Picture/".$row['Picture']."' width='100'>"."</td>";
    //รายละเอียด 
    echo "<td><a href='product.php?act=detail&ID=$row[0]' class='btn btn-info btn-xs'>รายละเอียด</a></td> ";
    //แก้ไขข้อมูล
    echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
    //ลบข้อมูล
    echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>