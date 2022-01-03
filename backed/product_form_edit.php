<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$ProID = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$all = "SELECT p.*,t.* FROM product as p 
INNER JOIN sub_category as t 
WHERE p.ProID = '$ProID'
ORDER BY p.SCatID asc";
$reall = mysqli_query($con, $all) or die ("Error in query: $sql " . mysqli_error());

$sql = "SELECT p.*,t.SCatIDName
FROM product as p 
INNER JOIN sub_category as t ON p.SCatID = t.SCatID
WHERE p.ProID = '$ProID'
ORDER BY p.SCatID asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);
?>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อสินค้า</p>
            <input type="text" maxlength="100" name="ProName" class="form-control" required placeholder="ชื่อสินค้า" / value="<?php echo $ProName; ?>">
          </div>
        </div>
         <div class="form-group">
          <div class="col-sm-6">
            <p> หมวดหมู่สินค้า </p>
            <select name="SCatID" class="form-control" required>
              <option value="<?php echo $row["SCatID"];?>">
                <?php echo $row["SCatIDName"]; ?>
              </option>
              <option value="SCatID">หมวดหมู่สินค้า</option>
              <?php foreach($reall as $results){?>
              <option value="<?php echo $results["SCatID"];?>">
                <?php echo $results["SCatIDName"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> ราคาสินค้า</p>
            <input type="number"  step="0.01" min='1' name="Price" class="form-control" required placeholder="ราคาสินค้า" / value="<?php echo $Price; ?>">
            <p>ส่วนลด</p>
            <input type="number"  min='0' name="Discount" class="form-control" required placeholder="ส่วนลด" / value="<?php echo $Discount; ?>">
            <p> จำนวนสินค้า</p>
            <input type="dubble"   min='1' name="Stock" class="form-control" required placeholder="จำนวนสินค้า" / value="<?php echo $Stock; ?>">
          </div>
        </div>      
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
             <textarea  name="ProDe" required maxlength="500" rows="5" cols="60"><?php echo $ProDe; ?>
             </textarea>
          </div>
        </div>
            <div class="form-group">
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <img src="Picture/<?php echo $row['Picture'];?>" width="100px">
            <br>
            <br>
            <input type="file"  name="Picture"  id="Picture" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
             <input type="hidden" name="ProID" value="<?php echo $ProID; ?>" />
             <input type="hidden" name="img2" value="<?php echo $Picture; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>