<meta charset="UTF-8">
<?php
include('condb.php');
include('shopdb.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());
//รับค่าไฟล์จากฟอร์ม
$OwID = $_SESSION['OwID'];
$ProName = $_POST['ProName'];
$Price = $_POST['Price'];
$SCatID = $_POST['SCatID'];
$ProDe = $_POST['ProDe'];
$Discount = $_POST['Discount'];
$Stock = $_POST['Stock'];
$Picture = (isset($_POST['Picture']) ? $_POST['Picture'] : '');
//img
$upload = $_FILES['Picture'];
if ($upload <> '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path = "Picture/";

	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['Picture']['name'], ".");

	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname = 'Picture' . $numrand . $date1 . $type;
	$path_copy = $path . $newname;
	$path_link = "Picture/" . $newname;

	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['Picture']['tmp_name'], $path_copy);
}
// เพิ่มไฟล์เข้าไปในตาราง uploadfile

$sql = "INSERT INTO product
		(
		ProName,
		SCatID,
		Price,
		Discount,
		Stock,
		ProDe,
		OwID,
		Picture
		)
		VALUES
		(
		'$ProName',
		'$SCatID',
		'$Price',
		'$Discount',
		'$Stock',
		'$ProDe',
		'$OwID',
		'$newname')";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

mysqli_close($con);
// javascript แสดงการ upload file


if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('Add Succesfuly');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	// echo "window.location = 'product.php'; ";
	echo "</script>";
}
?>