 <?php
      include('h.php');
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM shipper" or die("Error:" . mysqli_error());
                

                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>ขนส่ง</td>
                      <td>เบอร์โทรศัพท์</td>
                      <td> </td>
                      <td> </td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    // echo "<td>" .$row["ShipperID "] .  "</td> ";
                    echo "<td>" .$row["ComName"] .  "</td> ";
                    echo "<td>" .$row["Phone"] .  "</td> ";
                  
                    //แก้ไขข้อมูล
                    echo "<td><a href='shipper.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='shipper_form_delete_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>