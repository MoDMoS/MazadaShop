<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$ProID = $_POST["ProID"];
$ProName = $_POST["ProName"];
$Price = $_POST["Price"];
$SCatID = $_POST["SCatID"];
$ProDe = $_POST["ProDe"];
$Discount = $_POST['Discount'];
$Stock = $_POST['Stock'];
$Picture = (isset($_POST['Picture']) ? $_POST['Picture'] : '');
$img2 = $_POST['img2'];
$upload = $_FILES['Picture']['name'];
if ($upload != '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path = "Picture/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['Picture']['name'], ".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname = $numrand . $date1 . $type;

	$path_copy = $path . $newname;
	$path_link = "Picture/" . $newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['Picture']['tmp_name'], $path_copy);
} else {
	$newname = $img2;
}

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE product SET  
			ProName='$ProName',
			Price='$Price',
			Discount='$Discount',
			Stock='$Stock',
			SCatID='$SCatID', 
			ProDe='$ProDe',
			Picture='$newname'
			WHERE ProID='$ProID' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>