<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM  sub_category  ORDER BY sub_category.SCatID asc" or die("Error:" . mysqli_error($con));
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
    <form name="addproduct" action="product_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-9">         
          <p> ชื่อสินค้า</p>
          <input type="text" maxlength="100" name="ProName" class="form-control" required placeholder="ชื่อสินค้า" />            
          <p> หมวดหมู่สินค้า </p>
          <select name="SCatID" class="form-control" required>
            <option value="SCatID">หมวดหมู่สินค้า</option>
            <?php foreach ($result as $results) { ?>
              <option value="<?php echo $results["SCatID"]; ?>">
                <?php echo $results["SCatIDName"]; ?>
              </option>
            <?php } ?>
          </select>       
          <p> ราคาสินค้า</p>
          <input type="number" step="0.01" name="Price" class="form-control" min='1' required placeholder="ราคาสินค้า" />
          <p>ส่วนลด</p>
          <input type="number" name="Discount" class="form-control" min='0' required placeholder="ส่วนลด" />
          <p> จำนวนสินค้า</p>
          <input type='number' name="Stock" class="form-control" min='1' required placeholder="จำนวนสินค้า" />
          <p> รายละเอียดสินค้า </p>
          <textarea maxlength="500" name="ProDe" rows="5" cols="60" required ></textarea>
          <p> ภาพสินค้า </p>
          <input type="file" name="Picture"   id="Picture" class="form-control " />
          <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
        </div>
      </div>
    </form>
  </div>
</div>