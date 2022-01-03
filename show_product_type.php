<?php require_once('backed/condb.php');

$SCatID = $_GET['SCatID'];

$query_product_type = "SELECT * FROM product as p INNER JOIN sub_category as t 
ON  p.SCatID = t.SCatID
WHERE p.SCatID = $SCatID 
ORDER BY p.ProID ASC";
$result_pro = mysqli_query($con, $query_product_type) or die("Error in query: $query_product_type " . mysqli_error());
// echo($query_product_type);
// exit()

?>
<div class="row">

    <?php foreach ($result_pro as  $row_pro) { ?>

        <!-- start single product item -->
        <li>
            <figure>
                <a class="aa-product-img" href="product-detail.php?id=<?php echo $row_pro ['ProID'];?>"> <img class="card-img-top" src="backed/Picture/<?php echo $row_pro['Picture'] ?>" width=250 alt="polo shirt img"></a>
                <!-- <a class="aa-add-card-btn" href='cart.php?ProID=<?php echo $row_pro['ProID']; ?>&act=add'><span class="fa fa-shopping-cart"></span>Add To Cart</a> -->
                <figcaption>
                    <h4 class="aa-product-title"><a href="#"><?php echo $row_pro['ProName'] ?></a></h4>
                    <span class="aa-product-price">ราคา <?php echo number_format($row_pro['Price'] - $row_pro["Discount"],2) ?> บาท</span>

                </figcaption>
            </figure>
            <!-- <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
              </div> -->
        </li>


    <?php } ?>




</div>