<?php  
 $connect = mysqli_connect("localhost", "root", "", "logindb");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"]; 
 $sql = "UPDATE student_cgpa SET ".$column_name."='".$text."' WHERE sid='".$id."'"; 
 //$sql = "Repalce into student_cgpa SET ".$column_name."='".$text."' WHERE sid='".$id."'"; 
 //REPLACE into table (id, name, age) values(1, "A", 19)
 
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 else
	 echo "Data is not stored";
 ?>