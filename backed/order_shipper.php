<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$OrderID  = $_GET["ID"];
//2. query ข้อมูลจากตาราง:

$sql = "SELECT * FROM `order` as o INNER JOIN shipper as s ON (o.ShipperID=s.ShipperID)                   
WHERE o.OrderID  = '".$OrderID."' ";
$result2 = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

$all= "SELECT * FROM `order` as o INNER JOIN shipper as s                    
WHERE o.OrderID  = '".$OrderID."' ";
$reall = mysqli_query($con, $all) or die("Error in query: $sql " . mysqli_error($con));

$row = mysqli_fetch_array($result2);
extract($row);

?>
<div class="container">
  <p> </p>
  <div class="row">
    <div class="col-md-12">
      <form name="admin" action="order_shippe_db.php" method="POST" id="admin" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-6" align="left">     
                <p></p>
                <select name="ShipperID" class="form-control" required>
                <option value="<?php echo $row["ShipperID"];?>"><?php echo $row["ComName"]; ?></option>

                  <?php foreach ($reall as $results) { ?>
                    <option value="<?php echo $results["ShipperID"]; ?>">
                      <?php echo $results["ComName"]; ?>
                    </option>
                  <?php } ?>
                </select>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="right">
          <input type="hidden" name="OrderID" value="<?php echo $OrderID; ?>" />
            <button type="submit" class="btn btn-success btn-sm" id="btn"> บันทึก </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>