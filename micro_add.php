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

<form action="micro_add.php" method="GET">

<h1>FRANKLIN UNIVERSITY</h1>
<h2>
<a href="http://localhost/lessons/micro2.php/">VISIT HOME PAGE</a>
</h2>





ROLL:       <input type="INT" name="name"><br>
PROG CODE:  <input type="INT" name="prog_code"><br>

<input type="submit" value ="Submit">
</form>
</pre>


<?php



   if(isset($_GET['prog_code'])&& !empty($_GET['prog_code'])){


  
	$roll=$_GET['name'];
	$prog_code=$_GET['prog_code'];



   
  $query3="SELECT Roll_num FROM STUDENT WHERE Roll_num='$roll'"; 
  $query_run3 = mysql_query($query3) ;
$query_num_rows3= mysql_num_rows($query_run3);
   
    if($query_num_rows3>=1){


   
  $query4="SELECT Program_code FROM PROGRAM WHERE Program_code='$prog_code'"; 
  $query_run4 = mysql_query($query4) ;
$query_num_rows4= mysql_num_rows($query_run4);
   
    if($query_num_rows4>=1){



	$query1="SELECT ELIGIBILITY.Course_code FROM ELIGIBILITY , ACADEMIC WHERE (ELIGIBILITY.Prog_code= '$prog_code')  AND (ACADEMIC.Roll_num='$roll') AND (ACADEMIC.Course_code=ELIGIBILITY.Course_code) AND (ACADEMIC.Grade<=ELIGIBILITY.Min_grade)";
	
        $query2="SELECT Course_code FROM ELIGIBILITY WHERE Prog_code='$prog_code'";
 if($query_run1 = mysql_query($query1) ){
//echo '1 query run';
 $query_num_rows1= mysql_num_rows($query_run1);
}
 if($query_run2 = mysql_query($query2) ){
//echo '2 query run';
 $query_num_rows2= mysql_num_rows($query_run2);
}





	if($query_run1 = mysql_query($query1) && $query_run2 = mysql_query($query2) )   {
       	
//	$query_num_rows2= mysql_num_rows($query_run2);
  //      $query_num_rows1= mysql_num_rows($query_run1);
//echo $query_num_rows1.'and'.$query_num_rows2;

            if($query_num_rows1==$query_num_rows2  && $query_num_rows1 >=1 && $query_num_rows2 >=1){
   		echo 'Successfully paased';
		}else{
		echo'Failed';

		}
        }
	else{
	  echo'query error';
          die($mysql_error());;
	}
   }else {  echo 'INVALID PROGRAM CODE';};	



    }else {  echo'ROLL NOT FOUND';                       }

}
?>
</div>
