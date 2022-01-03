<!DOCTYPE html>
<html>

<head>
    <?php include('h.php'); 
    error_reporting( error_reporting() & ~E_NOTICE );
    ?>
    <head>
    <?php error_reporting(0) ?>
    <body>
       
            <?php include('navbar.php'); ?>
            <p></p>
            <div class="row">
                <div class="col-md-3">
                    <?php include('menu_left.php'); ?>
                </div>
                <div class="col-md-6">
                    <a href='product.php?act=add' class="btn-info btn-sm">เพิ่ม</a>
                    <p></p>
                    <?php
                    $act = $_GET['act'];
                    if ($act == 'add') {
                       include('product_form_add.php');
                    } elseif ($act == 'edit') {
                      include('product_form_edit.php');
                    } elseif ($act == 'detail') {
                        include('product_detail.php');                       
                    } else {
                        include('product_list.php');
                    }
                    ?>
                </div>
            </div>
      
    </body>

</html>