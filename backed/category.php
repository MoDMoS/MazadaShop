<!DOCTYPE html>
<html>

<head>
    <?php include('h.php'); 
    error_reporting( error_reporting() & ~E_NOTICE );
    ?>
    <head><?php error_reporting(0) ?>

    <body>
       
            <?php include('navbar.php'); ?>
            <p></p>
            <div class="row">
                <div class="col-md-3">
                    <?php include('menu_left.php'); ?>
                </div>
                <div class="col-md-6">
                    <a href="category.php?act=add" class="btn-info btn-sm">เพิ่มหมวดหมู่หลัก</a>
                    <p></p>
                    <?php
                    $act = $_GET['act'];
                    if ($act == 'add') {
                       include('category_form_add.php');
                    } elseif ($act == 'edit') {
                      include('category_form_edit.php');
                    } else {
                        include('category_list.php');
                    }
                    ?>
                </div>
            </div>
       
    </body>

</html>