<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "logindb");  
      $sql = "SELECT * FROM student_cgpa where sid='1304079'";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr style="height: 16.875px;">  
	                      <th style="width: 86px; height: 15.875px; text-align: center;">CREDIT HOURS COMPLETED</th>
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L1T1"].'</td>  
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L1T2"].'</td>  
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L2T1"].'</td>  
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L2T2"].'</td>  
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L3T1"].'</td> 
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L3T2"].'</td>  
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L4T1"].'</td>  
                          <td style="width: 55px; height: 15.875px; text-align: center;">'.$row["L4T2"].'</td> 						  
                     </tr>
                     <tr  style="height: 17px;">  
					      <th style="width: 86px; height: 17px; text-align: center;">&nbsp;GPA</th>
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L1T1"].'</td>  
                          <td  style="width:55px; height: 17px; text-align: center;">'.$row["L1T2"].'</td>  
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L2T1"].'</td>  
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L2T2"].'</td>  
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L3T1"].'</td> 
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L3T2"].'</td>  
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L4T1"].'</td>  
                          <td style="width: 55px; height: 17px; text-align: center;">'.$row["L4T2"].'</td> 						  
                     </tr>
					 
					
					 
           					 
                          ';  
      }  
      return $output;  
 }
function fetch_id()
{
	return  "1304079";
} 
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '7', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 14);  
      $obj_pdf->SetFont('helvetica', '', 10);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= ' 
      

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>
<h3 style="text-align: left;"><img src="https://image.ibb.co/cocbmo/header.jpg" alt="" width="772" height="174" /></h3>
<p>STUDENT NO:';

$content .=fetch_id();
$content .='

</p>
<p>NAME OF THE STUDENT:</p>
<p style="text-align: left;">In English&nbsp;</p> 
<p>In Bengali</p>
<p>DEPARTMENT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; TERM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; LEVEL&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SESSION</p>
<hr />
<p>&nbsp;NAME OF THE HALL:</p>
<table style="height: 302px; " width="687" border="1" cellspacing="0">

<tr>
<td style="width: 80px;">
<p style="text-align: center;">COURSE NO</p>
</td>
<td style="width: 250px; text-align: center;">COURSE TITLE</td>
<td style="width: 100px; text-align: center;">
<p>CREDIT HOURS</p>
</td>
<td style="width: 120px; text-align: center;">REMARKS</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 80px; text-align: center;">&nbsp;</td>
<td style="width: 250px; text-align: center;">&nbsp;</td>
<td style="width: 100px; text-align: center;">&nbsp;</td>
<td style="width: 120px; text-align: center;">&nbsp;</td>
</tr>

</table>
<p>&nbsp;</p>
<table style="height: 150px;" border="1" width="526" cellspacing="">

<tr style="height: 16.875px;">
<th style="width: 86px; height: 15.875px; text-align: center;">&nbsp;</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L1T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L1T2</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L2T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L2T2</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L3T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L3T2</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L4T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L4T2</th>
</tr>



      


		   
      ';  
      $content .= fetch_data();
      	  
      $content .= '</table>'; 
      $content .='
	  <p style="text-align: right;">&nbsp;</p>
<p style="text-align: right;">Signature of the student&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p style="text-align: right;">Date :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<hr />
<p style="text-align: left;">Provost&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Advisor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Head</p>
<p style="text-align: left;">Signature &amp; Date:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Signature &amp; Date:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Signature &amp; Date:</p>
<p style="text-align: left;">Name:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Name:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Name:</p>
 </body>  
 </html>
'

	  ;	  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>
<h3 style="text-align: left;"><img src="https://image.ibb.co/cocbmo/header.jpg" alt="" width="770" height="174" /></h3>
<p>STUDENT NO:<?php echo "1304079";?></p>
<p>NAME OF THE STUDENT:</p>
<p style="text-align: left;">In English<?php echo "1304079";?></p> 
<p>In Bengali</p>
<p>DEPARTMENT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; TERM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; LEVEL&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SESSION</p>
<hr &nbsp;/>
<p>&nbsp;NAME OF THE HALL:</p>
<table style="height: 302px; width: 683px;" border="1" cellspacing="0">

<tr>
<td style="width: 93.6px;">
<p style="text-align: center;">COURSE NO</p>
</td>
<td style="width: 320px; text-align: center;">COURSE TITLE</td>
<td style="width: 116.8px; text-align: center;">
<p>CREDIT HOURS</p>
</td>
<td style="width: 121.6px; text-align: center;">REMARKS</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 93.6px; text-align: center;">&nbsp;</td>
<td style="width: 320px; text-align: center;">&nbsp;</td>
<td style="width: 116.8px; text-align: center;">&nbsp;</td>
<td style="width: 121.6px; text-align: center;">&nbsp;</td>
</tr>

</table>
<p>&nbsp;</p>
<table style="height: 150px;" border="1" width="687" cellspacing="0">

<tr style="height: 15.875px;">
<th style="width: 75px; height: 15.875px; text-align: center;">&nbsp;</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L1T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L1T2</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L2T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L2T2</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L3T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L3T2</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L4T1</th>
<th style="width: 55px; height: 15.875px; text-align: center;">L4T2</th>
</tr>

<?php  
                     echo fetch_data();  
 
 ?> 

</table>


<p style="text-align: right;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p style="text-align: right;">Signature of the student&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p style="text-align: right;">Date :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<hr />
<p style="text-align: left;">Provost&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Advisor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Head</p>
<p style="text-align: left;">Signature &amp; Date:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Signature &amp; Date:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Signature &amp; Date:</p>
<p style="text-align: left;">Name:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Name:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Name:</p>'
 
 
 
<form method="post">  
                     <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>
  
    </body>  
 </html>