<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Teachers Profile</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css2/style.css">
  
</head>

<body>
	 



  <div class="table-users">
   <div class="header">Student List</div>
   
   <table cellspacing="0">
      <tr>
         <th>Picture</th>
         <th>Name</th>
         <th>Student Id</th>
		 <th>Email</th>
         <th width="230">Phone</th>
		  <th>CGPA</th>
		  
         <th >Comments</th>
      </tr>

      <tr>
         <td><img src="http://lorempixel.com/100/100/people/1" alt="" /></td>
         <td>Jane Doe</td>
         <td>jane.doe@foo.com</td>
         <td>01 800 2000</td>
         <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </td>
      </tr>

      <tr>
         <td><img src="http://lorempixel.com/100/100/sports/2" alt="" /></td>
         <td>John Doe</td>
         <td>john.doe@foo.com</td>
         <td>01 800 2000</td>
         <td>Blanditiis, aliquid numquam iure voluptatibus ut maiores explicabo ducimus neque, nesciunt rerum perferendis, inventore.</td>
      </tr>

      <tr>
         <td><img src="http://lorempixel.com/100/100/people/9" alt="" /></td>
         <td>Jane Smith</td>
         <td>jane.smith@foo.com</td>
         <td>01 800 2000</td>
         <td> Culpa praesentium unde pariatur fugit eos recusandae voluptas.</td>
      </tr>
      
      <tr>
         <td><img src="http://lorempixel.com/100/100/people/3" alt="" /></td>
         <td>John Smith</td>
         <td>john.smith@foo.com</td>
         <td>01 800 2000</td>
         <td>Aut voluptatum accusantium, eveniet, sapiente quaerat adipisci consequatur maxime temporibus quas, dolorem impedit.</td>
      </tr>
   </table>
</div>
  
  

</body>

</html>

<?php
if(!empty($_POST["logout"])) {
  $_SESSION["user_id"] = "";
   header('Location: index.php');
  session_destroy();
}
?>
