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
                    <p></p>
                    <?php
                    $act = $_GET['act'];
                   if ($act == 'detail') {
                        include('order_detail.php');                       
                    } elseif ($act == 'confirm') {
                        include('order_confirm.php');                       
                    } elseif ($act == 'cancel') {
                        include('order_cancel.php');                       
                    }elseif ($act == 'shipper') {
                        include('order_shipper.php');                       
                    }else {
                        include('order_list.php');
                    }
                    ?>
                </div>
            </div>
      
    </body>

</html>