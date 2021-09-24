<?php
$con = new mysqli('localhost','root','','lazada');

if($con->connect_error){
    die('Database error:' . $con->connect_error);
}