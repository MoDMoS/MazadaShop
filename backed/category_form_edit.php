<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$CatID = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM category WHERE CatID ='$CatID' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<div class="container">
  <p> </p>
    <div class="row">
      <div class="col-md-12">
        <form  name="admin" action="category_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
          <input type="hidden" name="CatID" value="<?php echo $CatID; ?>" />
          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="CatName" type="text" maxlength="50" required class="form-control" id="CatName" value="<?=$CatName;?>" placeholder="หมวดหมู่สินค้า"   />
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