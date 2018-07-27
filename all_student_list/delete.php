
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "logindb");  
 $sql = "DELETE FROM userinfotbl WHERE sid = '".$_POST["id"]."'";  
  $sql1 = "DELETE FROM student_cgpa WHERE sid = '".$_POST["id"]."'"; 
 if(mysqli_query($connect, $sql) && mysqli_query($connect, $sql1))  
 {  
      echo 'Data Deleted';  
 }  
 ?>