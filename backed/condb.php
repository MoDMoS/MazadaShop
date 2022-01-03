<?php
// $con = new mysqli('localhost','root','','lazada');
$con = new mysqli('localhost','projectdat_db','Wfykjr_2Ah','projectdat_db');

if($con->connect_error){
    die('Database error:' . $con->connect_error);
}