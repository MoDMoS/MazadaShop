<?php
	include('h.php');
	include("backed/condb.php");
	include('backed/customerdb.php'); 
	
?>

<meta charset=utf-8>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
	
	$CustomerID = $_SESSION['CustomerID'];
	$email = $_SESSION['Email']; 
	$OrPrice = $_POST['OrPrice'];	
	$OrDiscount = $_POST['OrDiscount'];	
	$total = $_POST["total"];
	$dttm = Date("Y-m-d G:i:s");
	//บันทึกการสั่งซื้อลงใน orderdetail
	$sql1	= "INSERT INTO `order`(`OrderID`, `TotalPrice`, `OrDiscount`, `OrPrice`, `OrderDate`,  `ShipperID`, `CustomerID`) values (null,'$total',$OrDiscount ,$OrPrice,'$dttm',1,'$CustomerID')";
	$query1	= mysqli_query($con, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "SELECT max(OrderID) as OrderID FROM `order` WHERE OrderID ";
	$query2	= mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);
	$OrderID  = $row["OrderID"];
	$Stock_array = $_POST['Stock'];
	$i = 0;
	foreach ($Stock_array as $ProID => $Stock) {
		$StockA[$i] = $Stock;
		$i++;
	}
	$i = 0;
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	$sql = "SELECT c.*,p.* FROM cart as c INNER JOIN product as p ON c.ProID = p.ProID AND c.CustomerID = $CustomerID ORDER BY c.CartID AND p.ProID asc";
	$query = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($query))
	{
		
		$qty = $row['QuantityC'];
		$ProID = $row['ProID'];
		$total	= $row['Price']*$qty;
		$OrDDiscount = $row['Discount']*$qty;	

		$sql4	= "INSERT INTO `orderdetails`(`OrDetID`, `Quantity`, `OrDDiscount`, `OrDPrice`, `Status`,`ProID`, `OrderID`)  values(null,'$qty',$OrDDiscount,'$total','⌛รอดำเนินการ','$ProID','$OrderID')";
		$query4	= mysqli_query($con, $sql4);
		$sql5	= "UPDATE `product` SET `Stock`=$StockA[$i] WHERE `ProID`=$ProID ";
		$query5	= mysqli_query($con, $sql5)or die("Error in query: $sql " . mysqli_error($con));
		$i++;
		
		
		$sql6 = "DELETE FROM cart WHERE CustomerID = $CustomerID AND ProID = $ProID";
		mysqli_query($con,$sql6);

		
	}
	if($query5){
		
		$msg = "สั่งซื้อสินค้าเรียบร้อย";
	}
	else{
		
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>

 




</body>
</html>