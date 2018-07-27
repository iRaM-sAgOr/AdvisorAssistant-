<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<?php //include('header_all.html'); ?>
<?php
  if(isset($_POST['print'])){
	  @$nsid=$_POST['sid'];
	  @$TL=$_POST['TL'];
	  $_SESSION['nsid']=$nsid;
	  $_SESSION['TL']=$TL;
	  header( "Location:form.php");
  }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Teachers Profile</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="teacherprofilestyle/css/style.css">
<link rel="stylesheet" href="teacherprofilestyle/css2/style.css">
  
</head>

<body>
	 
        <div id="main-wrapper">
     <center><h3>Welcome <?php echo $_SESSION['username'].' Sir'; ?></h3></center>
    
     <form action="" method="post">
           <div class="imgcontainer">

               <?php//.......photo show
                  $pp=$_SESSION['tid'];
     
                  $query="select pic from teacher where tid='$pp' ";
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
   <div class="header">Student List</div>
   
   <table cellspacing="0">
      <tr>
        <th>No</th>
         
         <th>Name</th>
         <th>Student Id</th>
		      <th>Email</th>
         <th width="230">Phone</th>
		     <th>CGPA</th>
         <th >BackLog</th>
		 <th >Supervisor</th>
      </tr>

       <?php
//........................
       if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
       } 
	   $type=$_SESSION['type'];
	   if($type=='Head'){$sql = "SELECT  * FROM userinfotbl";}
	   else{
		  $sql = "SELECT  * FROM userinfotbl where tid='$pp' "; 
		   //echo '<script type="text/javascript">alert($type)</script>';
	   }
        
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
   // output data of each row
      $no=0;
	  ////supervisor add korbo column e
	  
	  
////////////////////////resutl show
					
      while($row = $result->fetch_assoc())
     {
      $no++;
      $image=$row['pic'];
	  $student=$row["sid"];
	  echo "<tr>";
       echo "<td>" . $no ."</td>";
  
	  echo "<td><a href=\"teacher_to_student_profile.php?student=".$student."\" style ='text-decoration: none'>".$row["username"]. "</a></td>";
       echo "<td>". $row["sid"]. "</td>";
	   echo "<td>". $row["email"]. "</td>";
	    echo "<td>". $row["tel"]. "</td>";
	   echo "<td>". $row["cgpa"]. "</td>";
	   echo "<td>". $row["bl"]. "</td>";
	   //
	   $ssid=$row['tid'];
      $query1 = "select username from teachers_identity where tid='$ssid'  ";
	  $query_run1 = mysqli_query($con,$query1);
	  $data1=mysqli_fetch_array($query_run1);
	   //
	   echo "<td>". $data1["username"]. "</td>";
      echo  "</tr>";
	  
	  
     
      }
        // echo "</table>";
		
      } 
  else {  echo "<tr>";
       echo "<td colspan='7'> Sorry Sir ,You donot have any student registered</td>";
       
  
  }
   $con->close();
   //...................................
     echo "</table>";
   ?>
 





      
 
</div>
             <form action='Teachertable.php' method="post" enctype="multipart/form-data">
                <div class="group">
					<label  class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student ID</label>
					<input  type="id" placeholder = "Enter id" class="input" name='sid' data-type="id" required>
				</div>
				<div></div>
				<div ></div>
				<div class="group">
					<label  class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Term Level</label>
					<input  type="text" placeholder = "Enter TeamLevel" class="input" name='TL' data-type="text" required>
				</div>
				<div class="group">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class='button' name="print" >Create Pdf</button>
					
				</div>
  </form>

</body>

</html>


