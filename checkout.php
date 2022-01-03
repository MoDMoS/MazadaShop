<?php include('h.php');
include('h.php');
include("backed/condb.php");
include('backed/customerdb.php');
include('backed/cartdb.php');
error_reporting(0);
if ($_SESSION['CustomerID'] == "") {

  echo "<script>";
  echo "alert(\" กรุณาเข้าสู่ระบบ\");";
  echo "window.location='index.php'";
  echo "</script>";
}
?>

<head>
  <title>Check Order</title>
</head>

<body>
  <?php include('nav_member.php'); ?>


  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
  <img src="img/p1.jpg">
    <div class="aa-catg-head-banner-area">
      <div class="container">
        <div class="aa-catg-head-banner-content">
          <h2>Checkout Page</h2>
         
        </div>
      </div>
    </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Cart view section -->
  <section id="checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="checkout-area">
            <form id="frmcart" name="frmcart" method="post" action="saveorder.php">

              <div class="checkout-right">
                <h4>Order Summary</h4>
                <div class="aa-order-summary-area">
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        $CustomerID = $_SESSION['CustomerID'];
                        $sql = "SELECT c.*,p.* FROM cart as c INNER JOIN product as p ON c.ProID = p.ProID AND c.CustomerID = $CustomerID ORDER BY c.CartID AND p.ProID asc";
                        $query = mysqli_query($con, $sql);
                        $total = 0;
                        $i = 0;
                        while ($row = mysqli_fetch_array($query)) {
                          $sum = ($row['Price'] - $row["Discount"]) * $row['QuantityC'];
                          $total    += $sum;
                          $Discount = $row["Discount"] * $row['QuantityC'];
                          $OrDiscount    += $Discount;

                          $Price = $row["Price"] * $row['QuantityC'];
                          $OrPrice += $Price;


                          $OrDDiscount = $row["Discount"] * $row['QuantityC'];

                          $Stock[$i] = $row["Stock"] - $row['QuantityC'];
                          $stock = $Stock[$i];
                          echo "
                            <tr>  
                              <td>".$row['ProName']."<strong> X ".$row['QuantityC']."</strong></td>
                              <td>".number_format($sum, 2)." บาท</td>
                            </tr>
                            <td><input class='aa-cart-quantity' type='hidden' name='Stock[$ProID]' value='$stock'>
                          ";
                        ?>
                          <?php $i++; ?>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Subtotal</th>
                        <input type="hidden" name="OrPrice" value="<?php echo $OrPrice; ?>">
                        <input type="hidden" name="OrDDiscount" value="<?php echo $OrDDiscount; ?>">
                        <input type="hidden" name="OrDiscount" value="<?php echo $OrDiscount; ?>">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        
                        <td><?php echo number_format($total, 2) ?> บาท</td>
                      </tr>
                    </tfoot>                
                  </table>                                
                </div>
                <div class="aa-payment-method">
                  <input type="submit" value="Place Order" class="aa-browse-btn">
                </div>               
              </div>
            </form>
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