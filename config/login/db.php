<?php

$conn = new mysqli('localhost','root','','order');

if($conn->connect_error){
    die('Database error:' . $conn->connect_error);
}