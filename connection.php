<?php

	$cnctn=mysqli_connect("localhost","root","") or die("Error " . mysqli_error($cnctn));
	mysqli_select_db($cnctn,'logindb');
?>