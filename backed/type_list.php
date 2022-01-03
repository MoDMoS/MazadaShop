 <?php
      include('h.php');
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM type_list" or die("Error:" . mysqli_error());
                

                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>หมวดหมู่หลัก</td>
                      <td>หมวดหมู่ย่อย</td>
                      <td> </td>
                      <td> </td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    // echo "<td>" .$row["CatID"] .  "</td> ";
                    echo "<td>" .$row["CatName"] .  "</td> ";
                    // echo "<td>" .$row["SCatID"] .  "</td> ";
                    echo "<td>" .$row["SCatIDName"] .  "</td> ";
                    
                  
                    //แก้ไขข้อมูล
                    echo "<td><a href='type.php?act=edit&ID=$row[1]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='type_form_delete_db.php?ID=$row[1]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>