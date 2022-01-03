<?php include('h.php');
include('backed/condb.php');
include('backed/customerdb.php'); 
$ProID = $_GET["id"];
error_reporting(0);
if ($_SESSION['CustomerID'] == "") {
}else{
  $CustomerID = $_SESSION["CustomerID"];
}
require_once 'backed/cartdb.php';
?>

<body>
  <?php include('nav_member.php'); ?>
  <?php
  $sql = "SELECT * FROM product as p 
              INNER JOIN sub_category  as t ON p.SCatID =t.SCatID  
               AND ProID = $ProID ";
  $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
  $row = mysqli_fetch_array($result);
  
  ?>
  <title><?php echo $row["ProName"]?></title>
  
  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-lens-image"><?php echo "<img src='backed/Picture/" . $row['Picture'] . "'width='100%'>"; ?></a></div>
                      </div>
                     
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?php echo $row["ProName"]; ?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><?php echo number_format($row["Price"]-$row["Discount"],2) ?> บาท</span>
                      <p class="aa-product-avilability">สินค้าคงเหลือ: <span><?php echo $row["Stock"]; ?>   ชิ้น</span></p>
                    </div>
                                                  
                  
                      <p class="aa-prod-category">
                        หมวดหมู่สินค้า: <a href="#"><?php echo $row["SCatIDName"]; ?></a>
                      </p>
                    
                      <div class="aa-prod-view-bottom">
                      <form action="" method="post">
                        <input type="hidden" name="ProID" value="<?php echo $ProID; ?>"> 
                        <input type="hidden" name="CustomerID" value="<?php echo $CustomerID; ?>">
                        <?php if ($_SESSION['CustomerID'] == "") {  ?>                 
                          กรุณาเข้าสู่ระบบ เพื่อทำการสั่งซื้อ
                         <?php } else { ?>
                          <button type="submit" name="add-btn" class="btn btn-primary btn-lg">add to cart</button>
                          <?php }  ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                <p><?php echo $row["ProDe"]; ?></p>                  </div>            
              </div>
            </div>
        
    </div>
  </section>
  <!-- / product category -->






  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script>

</body>

</html>