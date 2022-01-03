<?php require_once('backed/condb.php');

$query_product = "SELECT * FROM product as p INNER JOIN sub_category as t 
    ON  p.SCatID = t.SCatID
    ORDER BY p.ProID ASC";
$result_pro = mysqli_query($con, $query_product) or die("Error in query: $query_product " . mysqli_error($con));

//exit()
?>

<div class="row">

    <?php foreach ($result_pro as  $row_pro) { ?>

        <!-- start single product item -->
        <li>
            <figure>            
                <a class="aa-product-img" href="product-detail.php?id=<?php echo $row_pro ['ProID'];?>" > <img class="card-img-top" src="backed/Picture/<?php echo $row_pro['Picture'] ?>"  width=250  alt="polo shirt img"></a>
                <!-- <a class="aa-add-card-btn" href='cart.php?ProID=<?php echo $row_pro['ProID']; ?>&act=add'><span class="fa fa-shopping-cart"></span>Add To Cart</a> -->
                <figcaption>
                    <h5 class="aa-product-title"><a href="#"><?php echo $row_pro['ProName'] ?></a></h5>
                    <span class="aa-product-price">ราคา <?php echo number_format($row_pro['Price']-$row_pro["Discount"],2) ?> บาท</span>
     
                </figcaption>
            </figure>
            
        </li>

      
    <?php } ?>




</div>