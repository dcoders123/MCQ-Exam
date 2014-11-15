 <!DOCTYPE HTML>

<?php

$conn_error ='could not connect.';

$mysql_host ='localhost';
$mysql_user ='root';
$mysql_pass ='123456';

$mysql_db ='UNIVERSITY';


if(!mysql_connect ($mysql_host, $mysql_user , $mysql_pass) || !mysql_select_db($mysql_db)){ 
     
die($conn_error);

}
//echo 'connected!';
?>








<div style="background-color:lightgrey ; padding-top:50px; text-align:center;padding-bottom:50px">
<pre>
<form action="micro_student.php" method="GET">
<h1>FRANKLIN UNIVERSITY</h1>
<h2>
<a href="http://localhost/lessons/micro2.php/">VISIT HOME PAGE</a>
</h2>




ROLL:       <input type="INT" name="name"><br>
PROG CODE:  <input type="INT" name="prog_code"><br>
YEAR :      <input type="INT" name="year"><br>
<input type="submit" value ="Submit">
</form>
</pre>




<?php

if(isset($_GET['prog_code'])&& !empty($_GET['prog_code'])){


  $current_year=1;
	$roll=$_GET['name'];
	$prog_code=$_GET['prog_code'];
	$year=$_GET['year'];

  $query2="SELECT Roll_num FROM STUDENT WHERE Roll_num='$roll'"; 
  $query_run2 = mysql_query($query2) ;
$query_num_rows2= mysql_num_rows($query_run2);
   
    if($query_num_rows2>=1){


   
  $query3="SELECT Program_code FROM PROGRAM WHERE Program_code='$prog_code'"; 
  $query_run3 = mysql_query($query3) ;
$query_num_rows3= mysql_num_rows($query_run3);
   
    if($query_num_rows3>=1){






	$query="INSERT INTO OTHER_DETAILS VALUES('".mysql_real_escape_string($roll)."','".mysql_real_escape_string($prog_code)."','".mysql_real_escape_string($year)."','".mysql_real_escape_string($current_year)."')";
	if($query_run = mysql_query($query))   {

   		echo 'Successfully Enrolled';

		}
	else{
	
           echo 'Failed';
	}
     
     }else{  echo 'PROGRAM CODE INVALID';}
		



}else{    

echo 'ROLL NOT VALID';
}
}

?>
</div>
