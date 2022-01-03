
<?php
include('backed/customerdb.php');    
error_reporting(0);
if ($_SESSION['CustomerID'] == "") {

  echo "<script>";
  echo "alert(\" กรุณาเข้าสู่ระบบ\");";
  echo "window.location='index.php'";
  echo "</script>";
}
?>
<?php include('h.php'); ?>
<head><title>Order</title></head>

<body>
<?php include('nav_member.php'); ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
  <img src="img/p1.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Order Details</h2>
        
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
              <form id="frmcart" name="frmcart" method="post" action="?act=update">
                <!-- <form id="frmcart" name="trmcsrt" method="post" action="backed/savecart.php"> -->
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                     
                        <th>Product</th>
                        <th>Price</th>                       
                        <th>Quantity</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       $query = "SELECT * FROM product as p INNER JOIN orderdetails as od ON (p.ProID=od.ProID) 
                       INNER JOIN `order` as o  ON (o.OrderID = od.OrderID)                       
                        INNER JOIN customer as c  ON (o.CustomerID = c.CustomerID)                      
                       WHERE o.CustomerID  = '".$_SESSION['CustomerID']."'ORDER BY o.CustomerID asc" or die("Error:" . mysqli_error($con));
                      
                      $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result) ) {
                          echo "<tr>";                         
                          echo "<td align=center>"."<img src='backed/Picture/".$row['Picture']."' width='100'>"."</td>";                       
                            echo "<td>" .$row["ProName"] .  "</td> ";
                            echo "<td>" .$row["Quantity"] .  "</td> ";
                            echo "<td>" .number_format($row["OrDPrice"]-$row["OrDDiscount"],2) .  "</td> ";
                            echo "<td>" .$row["Status"] .  "</td> ";
                          echo "</tr>";
                          }
                      ?>
                     
                    </tbody>
                  </table>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- / Cart view section -->

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