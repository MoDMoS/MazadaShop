
<?php
  require_once 'backed/customerdb.php';
?>

<?php include('h.php'); ?>
<head><title>My Account</title></head>

<body>
<?php include('nav_member.php'); ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
      <div class="col-md-12">
      <div class="aa-myaccount-area">         
          <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="aa-myaccount-login">
            <h4 align="center">My Account</h4>
              <form action="" method="post" class="aa-login-form">
                <label>CustomerID : <?php echo $_SESSION['CustomerID']?> </label><br>
                <label>Name : <?php echo $_SESSION['Name']?> </label><br>
                <label>Email : <?php echo $_SESSION['Email']?> </label><br>
                <label>Password : <?php echo $_SESSION['Password']?></label><br>
                <label>Address : <?php echo $_SESSION['Address']?> </label><br>
                <label>PostalCode : <?php echo $_SESSION['PostalCode']?> </label><br>
                <label>Phone : <?php echo $_SESSION['Phone']?> </label><br>
                <label>Birth Day : <?php echo $_SESSION['BDay']?> </label><br>
                <hr>
                <button type="submit" name ="account-btn" class="aa-browse-btn">แก้ไขข้อมูลส่วนตัว</button>
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