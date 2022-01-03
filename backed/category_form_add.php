<?php include('h.php'); ?>
<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM category ORDER BY CatID asc" or die("Error:" . mysqli_error($con));
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <p> </p>
  <div class="row">
    <div class="col-md-12">
      <form name="admin" action="category_form_add_db.php" method="POST" id="admin" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-6" align="left">            
           <p> หมวดหมู่หลัก</p>
            <input name="CatName" type="text" maxlength="50" required class="form-control" id="CatName" placeholder="หมวดหมู่สินค้า"  />

          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="right">
            <button type="submit" class="btn btn-success btn-sm" id="btn"> บันทึก </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>