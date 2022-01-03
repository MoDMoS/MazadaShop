<?php  require_once 'backed/condb.php';

	$query_type = "SELECT * FROM sub_category ORDER BY SCatID  ASC";
	$result_type =mysqli_query($con, $query_type) or die ("Error in query: $query_type " . mysqli_error());
		// echo($query_type);
		// exit()

?>

<div class="list-group"> 
	
	<?php
		foreach ($result_type as $row )  { ?>

		 <a href="index.php?act=showbytype&SCatID=<?php echo $row['SCatID'];?>" class="list-group-item list-group-item-action list-group-item-light"> 
		 	<?php echo $row["SCatIDName"]; ?></a>

	<?php } ?>                      
</div>