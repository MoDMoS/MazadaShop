<?php
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
} else {

  $ProID = $_GET['id'];
  $act = $_GET['act'];
  $CustomerID = $_SESSION['CustomerID'];

  if ($act == 'cancle') {
    unset($_SESSION['cart']);
  }
}

?>
<title>My Cart</title>

<body>

  <?php include('nav_member.php'); ?>

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
                        <th>Discount</th>
                        <th>Quantity</th>
                        <th>Total</th>

                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sql = "SELECT c.*,p.* FROM cart as c INNER JOIN product as p ON c.ProID = p.ProID AND c.CustomerID = $CustomerID ORDER BY c.CartID AND p.ProID asc";
                        $query = mysqli_query($con, $sql);
                        $total = 0;
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                          $sum = ($row["Price"] - $row["Discount"]) * $row['QuantityC'];
                          $total += $sum;
                          $Stock = $row["Stock"];
                          echo "
                          <tr>  
                            <td><a href='#'><img src='backed/Picture/" . $row["Picture"] . "' alt='Picture'></a></td>
                            <td><a class='aa-cart-title' href='#'>" . $row["ProName"] . "</a></td>
                            <td>" . number_format($row["Price"], 2) . "</td>
                            <td>" . number_format($row["Discount"], 2) . "</td>
                            <td><input class='aa-cart-quantity' type='number' name='amount[$ProID]' value='" . $row['QuantityC'] . "' min='1' max='$Stock'size='2'>
                            <input class='aa-cart-quantity' type='hidden' name='proID[$ProID]' value='" . $row['ProID'] . "'>
                            <input class='aa-cart-quantity' type='hidden' name='ProID' value='" . $row['ProID'] . "'></td>
                            <td>" . number_format($sum, 2) . "</td>
                            <td><a href='cart.php?ID=$row[0]' type='submit' name='remove-btn' class='remove'>Delete</a></td>
                          </tr> 
                        ";
                          $i++;
                        }
                      ?>
                        <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <a class="aa-cart-view-btn" type="button" href="index.php">Back To Home</a>
                          </div>
                          
                          <button class="aa-cart-view-btn" type="submit" name="update-btn" id="button">Update Cart</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <!-- Cart Total view -->
              <?php
            echo"
             <div class='cart-view-total'>
               <h4>Cart Totals</h4>
               <table class='aa-totals-table'>
                 <tbody>
                   <tr>
                     <th>Total</th>
                     <td>".number_format($total,2)."</td>
                   </tr>
                 </tbody>
               </table>
               <a href='checkout.php' class='aa-cart-view-btn'>Proced to Checkout</a>
             </div>
            ";
             
            //echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
           ?>
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