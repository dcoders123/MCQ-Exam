
<?php
require 'cor.inc.php';
$conn_error ='could not connect.';

$mysql_host ='localhost';
$mysql_user ='root';
$mysql_pass ='123456';

$mysql_db ='Online_Exam';


if(!mysql_connect ($mysql_host, $mysql_user , $mysql_pass) || !mysql_select_db($mysql_db)){ 
     
die($conn_error);

}
echo 'connected!';
?>


<?php
session_start();
$user=$_SESSION['User_id'];
echo $user;

	 $query1="SELECT  Marks FROM Marks WHERE User_id ='$user'"; 
  $query_run1 = mysql_query($query1) ;
   $query_num_rows1= mysql_num_rows($query_run1);
   
    if($query_num_rows1>=1){
$i=0;
echo 'i='.$i.'<br>';
         while($query_row1= mysql_fetch_assoc($query_run1)){      
       
  echo 'EXAM_NO-'.$i.'   '.'MARKS='. $query_row1['Marks'].'<br>';


       $i++;
          }

  }else{      
                 echo'ZERO RESULT';  
            }
















?>




