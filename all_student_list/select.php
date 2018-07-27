<?php  
 $connect = mysqli_connect("localhost", "root", "", "logindb");  
 $output = '';  
 $sql = "SELECT * FROM userinfotbl ORDER BY sid DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" table-layout: auto;
    width: 100% border-collapse: collapse; >  
                <tr>  
                     <th width="" >Student Id</th>  
                     <th width="" >Student Name</th>  
                     <th width="" >Supervisor</th>  
                     <th width="" >Email</th>  
                     <th width="" >M-Number</th> 
                      
					 
					 <th width="" >Level:1_Term:1</th>  
                     <th width="" >Level:1_Term:2</th>  
                     <th width="" >Level:2_Term:1</th>  
                     <th width="" >Level:2_Term:2</th>  
                     <th width="" >Level:3_Term:1</th>  
                     <th width="" >Level:3_Term:2</th>  
                     <th width="" >Level:4_Term:1</th>  
                     <th width="" >Level:4_Term:2</th>  
					 
                     <th width="" >CGPA</th>
                     <th width="" >Back logs!</th>
                     <th width="" >Remove</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
        $tec_id=$row['tid'];
        $sql1 = "SELECT username FROM teachers_identity where tid='$tec_id'"; 
        $result1 = mysqli_query($connect, $sql1);
        $row1 = mysqli_fetch_array($result1);
		//fetching the cgpa
		$sid=$row['sid'];
		 $sql2 = "SELECT * FROM student_cgpa where sid='$sid'"; 
        $result2 = mysqli_query($connect, $sql2);
        $row2 = mysqli_fetch_array($result2);
		
		//end fetching
           $output .= '  
                <tr>  
                     <td>'.$row["sid"].'</td>  
                     <td class="first_name" data-id1="'.$row["sid"].'" contenteditable>'.$row["username"].'</td>  
                     <td class="last_name" data-id2="'.$row["sid"].'" contenteditable>'.$row1["username"].'</td>  
                     <td class="first_name" data-id3="'.$row["sid"].'" contenteditable>'.$row["email"].'</td>  
                     <td class="last_name" data-id4="'.$row["sid"].'" contenteditable>'.$row["tel"].'</td> 
                     
                       
					 
					 
                     <td class="l1t1" data-id11="'.$row["sid"].'" contenteditable>'.$row2["L1T1"].'</td>  
                     <td class="l1t2" data-id12="'.$row["sid"].'" contenteditable>'.$row2["L1T2"].'</td>  
                     <td class="l2t1" data-id21="'.$row["sid"].'" contenteditable>'.$row2["L2T1"].'</td>  
                     <td class="l2t2" data-id22="'.$row["sid"].'" contenteditable>'.$row2["L2T2"].'</td> 
                    <td class="l3t1" data-id31="'.$row["sid"].'" contenteditable>'.$row2["L3T1"].'</td>  
                     <td class="l3t2" data-id32="'.$row["sid"].'" contenteditable>'.$row2["L3T2"].'</td>  
                     <td class="l4t1" data-id41="'.$row["sid"].'" contenteditable>'.$row2["L4T1"].'</td>  
                     <td class="l4t2" data-id42="'.$row["sid"].'" contenteditable>'.$row2["L4T2"].'</td> 
					 
					 <td class="cgpa" data-id7="'.$row["sid"].'" contenteditable>'.$row["cgpa"].'</td> 
                     <td class="bl" data-id8="'.$row["sid"].'" contenteditable>'.$row["bl"].'</td> 
					 
					 
                     <td><button type="button" name="delete_btn" data-id5="'.$row["sid"].'" class="btn btn-xs btn-danger btn_delete">Delete</button>
                     </td> 
                </tr>  
           ';  
      }  
     
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="16">No Student Request</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>