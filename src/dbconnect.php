<?php
//dbconnect.php

//create connection (server , username , password , database)
$con = mysqli_connect("localhost","root", "" , "itec106");
if(!$con){
	die("Cannot connect" . mysqli_connect_error());
}
?>
