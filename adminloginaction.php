<?php
  session_start();
  require_once('dbconfig/config.php');
  //phpinfo();
?>
<?php
       @$p=0;
      if(isset($_POST['login']))
      {

        @$name=$_POST['u'];
        @$password=$_POST['p'];
        
        if(@$password==10101 || @$password==11111 || @$password==99999){
           echo '<script type="text/javascript">alert(" You are authorized")</script>';
                   $_SESSION['name'] =@$name ;
                   
                   header( "Location: adminView.php");
        }
         else
      {
        echo '<script type="text/javascript">alert("Sorry! You are not authorized")</script>';
       $p=1;
       header('Location: adminlogib.php');
      }
      
                     
      }
     
      
    ?>