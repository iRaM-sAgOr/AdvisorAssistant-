<?php
	session_start();
	require_once('config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Student Profile</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="../studentprofilestyle/css/style.css">
      <link rel="stylesheet" href="../studentprofilestyle/css2/style.css">


           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  
</head>

<body>
        
	 
   <div id="main-wrapper">
     <center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>
    
     <form action="" method="post">
           <div class="imgcontainer">

               <?php
                  $pp=$_SESSION['sid'];
     
                  $query="select pic from userinfotbl where sid='$pp' ";
                  $query_run = mysqli_query($con,$query);
                   while($data=mysqli_fetch_array($query_run))
                     {
                       $image=$data['pic'];
                       echo "<img src=../imgs/".$image." width=100 height=100 alt=Loading!! class ='avatar'>";
                      }
                 
                  ?>   
           </div>
    </form>
  </div>


  <div class="table-users">
   <div class="header">Student List</div>
   <div >
           <div  >  
                  
                <div>  
                       
                     <div id="live_data"></div>                 
                </div>  
           </div>  
	   </div>
   
      
 
</div>
</div>
  
  

</body>

</html>
<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
	   
	  
      fetch_data();  
       
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id5");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });
	  
	 
	  
	  
       /*$(document).on('click', '#btn_add', function(){  
           var id=$(this).data("id6");  

           if(confirm("Are you sure you want to Add this?"))  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      }); */
	  
	   function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",   
                success:function(data){  
                     alert(data);  
                }  
           });  
      } 
	  //cgpa editing function start
	    function edit_data2(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit2.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",   
                success:function(data){  
                     alert(data);  
                }  
           });  
      } 
	  //end
      $(document).on('blur', '.username', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "username");  
      });  
      $(document).on('blur', '.email', function(){  
           var id = $(this).data("id3");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "email");  
      }); 
	  // edit start
	  
	   $(document).on('blur', '.tel', function(){  
           var id = $(this).data("id4");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "tel");  
      }); 
	   
	 
	  
	  
	  
	//cgpa edit end

 });  
 
 
 
 </script>

<?php
if(!empty($_POST["logout"])) {
  $_SESSION["user_id"] = "";
   header('Location: index.php');
  session_destroy();
}
?>
