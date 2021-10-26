<?php
// object base connection ....
$hostname = "localhost";
$username = "root";
$password = "";
$db =  "timer&captcha";
$conn = new mysqli($hostname,$username,$password,$db);
if($conn->connect_error){
die("connection error".$conn->connect_error);
}
session_start();
error_reporting('1');
?>
