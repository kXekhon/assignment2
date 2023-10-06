<?php

$con=new mysqli('localhost','root','','russel_clinic');

if(!$con){

	echo die(mysqli_error($con));
}

?>