<html>  
      <head>  
           <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body style="background-color: #fefbd8;">  
	  
	  <div >
           <div class="container" >  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Students Request List</h3><br />  
                     <div id="live_data"></div>                 
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
	  
	 
	  
	  
       $(document).on('click', '#btn_add', function(){  
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
      }); 
	  
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
	  
      $(document).on('blur', '.cgpa', function(){  
           var id = $(this).data("id7");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "cgpa");  
      });  
      $(document).on('blur', '.bl', function(){  
           var id = $(this).data("id8");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "bl");  
      }); 
	

 });  
 
 
 
 </script>