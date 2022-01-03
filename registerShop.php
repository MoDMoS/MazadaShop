<?php
  require_once 'backed/shopdb.php';
?><?php include('h.php'); ?>
<head><title>Register Shop</title></head>
<<<<<<< HEAD
=======

>>>>>>> efd6c0683092000131658f30c45ab6e9f10cd7fd
<body>
<?php include('nav_member.php'); ?> 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
  <img src="img/p1.jpg">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Shop Register</h2>       
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="col-sm-6 col-sm-offset-3 form-box">
                <div class="aa-myaccount-register">                 
                    <h4 align="center">Shop Register</h4>
                    <form action="" method="post" class="aa-login-form">
                        <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                    <li><?php echo $error ?></li>
                                <?php endforeach ?>
                            </div>
                        <?php endif; ?>
                        <label for="">Name<span>*</span></label>
                        <input type="text" name = "name" placeholder="Name">
                        <label for="">Password<span>*</span></label>
                        <input type="password" name ="password" placeholder="Password" >
                        <label for="">Confirm password<span>*</span></label>
                        <input type="password" name = "passwordConf" placeholder="Confirm password" >
                        <label for="">Email<span>*</span></label>
                        <input type="email" name ="email" placeholder="Email">
                        <button type="submit" name="registerShop-btn" class="aa-browse-btn" >Register</button>
                        <div class="aa-myaccount-register">
                            <br>
                            <p class="aa-lost-password">Have a mamber?</p><a href="loginCus.php"><strong>Login</strong></a>
                        </div>
                  </form> 
                </div>
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
