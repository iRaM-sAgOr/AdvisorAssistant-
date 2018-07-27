<?php
    require __DIR__.'/vendor/autoload.php';
    include"connection.php";
    
    use Spipu\Html2Pdf\Html2Pdf;
    $id = $_GET['id'];
    $level = $_GET['level'];
    $term  = $_GET['term'];
    $sql = "select * from userinfotbl where sid=$id;";
    
    $result = mysqli_query($cnctn, $sql) or die("Error in Selecting " . mysqli_error($cnctn));
    $row =mysqli_fetch_assoc($result);
	
	$sql = "select * from course_details where level=$level and term=$term;";
    
    $result = mysqli_query($cnctn, $sql) or die("Error in Selecting " . mysqli_error($cnctn));
	$i = 0;
    while($row2=mysqli_fetch_assoc($result)){
		$cid[$i] = $row2['id'];
		$cname[$i] = $row2['name'];
		$credit[$i] = $row2['credit'];
		$i++;
	}
	
	for($j=$i;$j<9;$j++){
		$cid[$j] = "";
		$cname[$j] = "";
		$credit[$j] = "";
	}
	$sql = "select * from sem_credit;";
    
    $result = mysqli_query($cnctn, $sql) or die("Error in Selecting " . mysqli_error($cnctn));
	$k = 0;
    while($row3=mysqli_fetch_assoc($result)){
		$sem_credit[$k] = $row3['credit'];
		$k++;
	}
	
	$x1 = (int) date('Y');
	$x1 = $x1 - 1;	
	$x2 = $x1 - 1;
	$session = ''.$x2.'-'.$x1.'';
	
	for($k=1;$k<=8;$k++){
		$x = 'cgpa'.$k;
		if($row[$x]=="0"){
			$row[$x] = "";
			$sem_credit[$k-1] = "";
		}
			
	}
	
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML('<head>
<style>
.write{
	font-family: "courier";
	font-size: "large";
	font-style: "italic";
}
</style>
<meta http-equiv="Content-Type" content="application/pdf">
</head>

<body>
<h3 style="text-align: left;"><img src="header.jpg" alt="" width="772" height="174" /></h3>
<p>STUDENT NO:&nbsp;&nbsp;&nbsp;&nbsp;<span class="write">'.$id.'</span></p>
<p>NAME OF THE STUDENT: &nbsp;&nbsp;&nbsp;<span class="write">'.$row['username'].'</span></p>
<p>DEPARTMENT &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="write">'.$row['dept'].'</span> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; TERM &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="write">'.$term.'</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; LEVEL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="write">'.$level.'</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SESSION &nbsp; &nbsp; &nbsp; <span class="write">'.$session.'</span></p>
<hr />
<p>&nbsp;NAME OF THE HALL: &nbsp;&nbsp;&nbsp;<span class="write">'.$row['hall'].'</span></p>
<table style="height: 311px; width: 729px;" border="1" cellspacing="0">
<tbody>
<tr>
<td style="width: 100px;">
<p style="text-align: center;">COURSE NO</p>
</td>
<td style="width: 356px; text-align: center;">COURSE TITLE</td>
<td style="width: 96px; text-align: center;">
<p>CREDIT HOURS</p>
</td>
<td style="width: 159px; text-align: center;">REMARKS</td>
</tr>
<span class="write">
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[0].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[0].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[0].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[1].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[1].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[1].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[2].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[2].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[2].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[3].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[3].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[3].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[4].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[4].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[4].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[5].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[5].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[5].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[6].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[6].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[6].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[7].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[7].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[7].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="width: 100px; text-align: center;">&nbsp;'.$cid[8].'</td>
<td style="width: 356px; text-align: center;">&nbsp;'.$cname[8].'</td>
<td style="width: 96px; text-align: center;">&nbsp;'.$credit[8].'</td>
<td style="width: 159px; text-align: center;">&nbsp;</td>
</tr>
</span>
</tbody>
</table>
<p>&nbsp;</p>
<table style="height: 157px;" border="1" width="726" cellspacing="5">
<tbody>
<tr style="height: 15.875px;">
<td style="width: 86px; height: 15.875px; text-align: center;">&nbsp;</td>
<td style="width: 68px; height: 15.875px; text-align: center;">L1T1</td>
<td style="width: 68px; height: 15.875px; text-align: center;">L1T2</td>
<td style="width: 68px; height: 15.875px; text-align: center;">L2T1</td>
<td style="width: 69px; height: 15.875px; text-align: center;">L2T2</td>
<td style="width: 69px; height: 15.875px; text-align: center;">L3T1</td>
<td style="width: 70px; height: 15.875px; text-align: center;">L3T2</td>
<td style="width: 70px; height: 15.875px; text-align: center;">L4T1</td>
<td style="width: 70px; height: 15.875px; text-align: center;">L4T2</td>
</tr>
<tr style="height: 15.875px;">
<td style="width: 86px; height: 15.875px; text-align: center;">CREDIT HOURS COMPLETED</td>
<span class="write">
<td style="width: 68px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[0].'</td>
<td style="width: 68px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[1].'</td>
<td style="width: 68px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[2].'</td>
<td style="width: 69px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[3].'</td>
<td style="width: 69px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[4].'</td>
<td style="width: 70px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[5].'</td>
<td style="width: 70px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[6].'</td>
<td style="width: 70px; height: 15.875px; text-align: center;">&nbsp;'.$sem_credit[7].'</td>
</span>
</tr>
<tr style="height: 17px;">
<td style="width: 86px; height: 17px; text-align: center;">&nbsp;GPA</td>
<span class="write">
<td style="width: 68px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa1'].'</td>
<td style="width: 68px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa2'].'</td>
<td style="width: 68px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa3'].'</td>
<td style="width: 69px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa4'].'</td>
<td style="width: 69px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa5'].'</td>
<td style="width: 70px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa6'].'</td>
<td style="width: 70px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa7'].'</td>
<td style="width: 70px; height: 17px; text-align: center;">&nbsp;'.$row['cgpa8'].'</td>
</span>
</tr>
</tbody>
</table>
<p style="text-align: right;">&nbsp;</p>
<p style="text-align: right;">Signature of the Student:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p style="text-align: right;">Date :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<hr />
<table style="height: 117px;" width="804" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 264px;">
<p>Provost</p>
<p>Signature &amp; Date:</p>
<p>Name:</p>
</td>
<td style="width: 265px;">
<p>Advisor</p>
<p>Signature &amp; Date:</p>
<p>Name:</p>
</td>
<td style="width: 267px;">
<p>Head</p>
<p>Signature &amp; Date:</p>
<p>Name:</p>
</td>
</tr>
</tbody>
</table>
</body>');    
$html2pdf->output();
    ?>