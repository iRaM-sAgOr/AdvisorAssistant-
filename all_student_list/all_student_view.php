<html>  
      <head>  
           <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="style.css" />  
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
                     <h3 align="center">All Students List</h3><br />  
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
	  //cgpa edit start
	  
	   $(document).on('blur', '.l1t1', function(){  
           var id = $(this).data("id11");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L1T1");  
      }); 
	  $(document).on('blur', '.l1t2', function(){  
           var id = $(this).data("id12");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L1T2");  
      }); 
	  $(document).on('blur', '.l2t1', function(){  
           var id = $(this).data("id21");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L2T1");  
      }); 
	  $(document).on('blur', '.l2t2', function(){  
           var id = $(this).data("id22");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L2T2");  
      }); 
	  $(document).on('blur', '.l3t1', function(){  
           var id = $(this).data("id31");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L3T1");  
      }); 
	  $(document).on('blur', '.l3t2', function(){  
           var id = $(this).data("id32");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L3T2");  
      }); 
	  $(document).on('blur', '.l4t1', function(){  
           var id = $(this).data("id41");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L4T1");  
      }); 
	  $(document).on('blur', '.l4t2', function(){  
           var id = $(this).data("id42");  
           var first_name = $(this).text();  
           edit_data2(id, first_name, "L4T2");  
      }); 
	  
	  
	  
	//cgpa edit end

 });  
 
 
 
 </script>