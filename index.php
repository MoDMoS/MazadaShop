<?php include('h.php'); ?>
<?php include('backed/condb.php'); ?>
<?php include('backed/customerdb.php'); ?>
<<<<<<< HEAD
=======
<head><title>Mazada Shop</title></head>
<body>
<?php include('nav_member.php'); ?>
>>>>>>> efd6c0683092000131658f30c45ab6e9f10cd7fd

<body>
<title>Mazada Shop</title>
  <?php include('nav_member.php'); ?>
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">

            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <?php
                $act = (isset($_GET['act']) ? $_GET['act'] : '');
                $search = (isset($_GET['search']) ? $_GET['search'] : '');
                
                if ($search != '') {
                  include('show_product_search.php');
                } elseif ($act == 'showbytype') {
                  include('show_product_type.php');
                } else {
                  include('show_product.php');
                }
                ?>
              </ul>
              <!-- quick view modal -->
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              </div>
              <!-- / quick view modal -->
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                <?php include('menu.php'); ?>
              </ul>
            </div>
          </aside>
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

<<<<<<< HEAD
</html>
=======
  </body>
</html>
>>>>>>> efd6c0683092000131658f30c45ab6e9f10cd7fd
