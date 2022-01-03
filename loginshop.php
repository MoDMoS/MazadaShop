<?php
  require_once 'backed/shopdb.php';
?>

<?php include('h.php'); ?>
<head><title>Login Shop</title></head>
<body>
<?php include('nav_member.php'); ?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/p1.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Login Shop</h2>
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
            <h4 align="center">Shop Login</h4>
              <form action="" method="post" class="aa-login-form">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error ?></li>
                        <?php endforeach ?>
                    </div>
                <?php endif; ?>
                <label for="">Email<span>*</span></label>
                <input type="text" name = "username" placeholder="Email">
                <label for="">Password<span>*</span></label>
                <input type="password" name = "password" placeholder="Password">
                <button type="submit" name ="loginShop-btn" class="aa-browse-btn">Login</button>
              <div class="aa-myaccount-login">
                <br>
                <!-- <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> -->
                <!-- <p class="aa-lost-password"><a href="#">Lost your password?</a></p> -->
                <p class="aa-lost-password">Not yet a mamber?</p><a href="registerShop.php"><strong>Register</strong></a>
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