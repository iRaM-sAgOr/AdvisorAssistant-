<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html lang="en" >
<?php
  $student=$_GET["student"];

  $query="select  * from userinfotbl where sid='$student' ";
  $query_run = mysqli_query($con,$query);
    $data=mysqli_fetch_array($query_run)
?>

<head>
  <meta charset="UTF-8">
  <title>Student Profile</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="teacherprofilestyle/css/style.css">
<link rel="stylesheet" href="teacherprofilestyle/css2/style.css">
  
</head>

<body>
	 
        <div id="main-wrapper">
     <center><h3>Profile Of <?php echo $data['username']; ?></h3></center>
    
     <form action="" method="post">
           <div class="imgcontainer">

               <?php
                
     
                 $query="select  * from userinfotbl where sid='$student' ";
                 $query_run = mysqli_query($con,$query);
                   while($data=mysqli_fetch_array($query_run))
                     {
                       $image=$data['pic'];
                       echo "<img src=imgs/".$image." width=100 height=100 alt=Loading!! class ='avatar'>";
                      }
                 
                  ?>   
           </div>
    </form>
  </div>


  <div class="table-users">
   <div class="header">Profile Details</div>
   
   <table cellspacing="0">
      <tr>
      
         
         <th>Level 1 Temr 1</th>
         <th>Level 1 Temr 2</th>
		      <th>Level 2 Temr 1</th>
         <th>Level 2 Temr 2</th>
		     <th>Level 3 Temr 1</th>
         <th >Level 3 Temr 2</th>
         <th>Level 4 Temr 1</th>
         <th >Level 4 Temr 2</th>
      </tr>

       <?php
//...............................
       if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
       } 
        $sql = "SELECT  * FROM student_cgpa where sid='$student' ";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
   // output data of each row
      $no=0;
      
      while($row = $result->fetch_assoc())
     {
      $no++;
      //$image=$row['pic'];
	  $student=$row["sid"];
	  echo "<tr>";
       echo "<td>" . $row["L1T1"] ."</td>";
       //echo "<td><img src=imgs/" . $image."</td>";
       echo  "<td>".$row["L1T2"]."</td>";
       echo "<td>". $row["L2T1"]. "</td>";
	   echo "<td>". $row["L2T2"]. "</td>";
	    echo "<td>". $row["L3T1"]. "</td>";
	   echo "<td>". $row["L3T2"]. "</td>";
	   echo "<td>". $row["L4T1"]. "</td>";
	   echo "<td>". $row["L4T2"]. "</td>";
      echo  "</tr>";
	  
	  
     
      }
        // echo "</table>";
		
      } 
  else {  echo "<tr>";
       echo "<td>Sorry Sir ,This Student did not submit his/her details</td>";
       //echo "<td><img src=imgs/" . $image."</td>";
       echo  "<td></td>";
       echo "<td></td>";
	   echo "<td></td>";
	    echo "<td></td>";
	   echo "<td></td>";
	   echo "<td></td>";
	   echo "<td></td>";
      echo  "</tr>";
  
  }
   $con->close();
   //...................................
     echo "</table>";
   ?>
 





      
 
</div>
<?php         
       // echo "<td><a href=\"teacher_to_student_profile.php?student=".$student."\" style ='text-decoration: none'>".$row["username"]. "</a></td>";   
        /*echo '<div class="group">';
		echo '<label  class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
        echo  "<a href=\"form.php?id=".$student."\" style ='text-decoration: none'><button type='submit' class='button' name='register' >Create PDF</button></a>";
					
		echo '</div>';*/			  

?>
  


</body>

</html>

<?php
if(!empty($_POST["logout"])) {
  $_SESSION["user_id"] = "";
   header('Location: index.php');
  session_destroy();
}
?>
