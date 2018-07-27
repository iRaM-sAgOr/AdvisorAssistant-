<?php  
 $connect = mysqli_connect("localhost", "root", "", "logindb");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"]; 
 //echo '<script type="text/javascript">alert(echo $text . $id)</script>';
 $sql = "UPDATE userinfotbl SET ".$column_name."='".$text."' WHERE sid='".$id."'"; 
 //echo $column_name;
 //echo $id;
 //echo $text;
 //$sql1="UPDATE" student_request SET cgpa='30' ,bl='asa' WHERE id
 //mysqli_query($connect, $sql)
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 else
	 echo "Data is not stored";
 ?>