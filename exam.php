
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








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>
sample quiz code
</title>
<style type="text/css">
</style>
</head>
<body>
<?php

echo $_SESSION['check'];
//session_destroy(); 
//session_start();

if($_SESSION['check']==2)  {
//echo 'here';


	$correct=0;
	$i=1;
	while($i<5){      



		$var11=$_SESSION["Option_A.$i"];
                $var22=$_SESSION["Option_B.$i"];
		$var33=$_SESSION["Option_C.$i"];
                $var44=$_SESSION["Option_D.$i"];

echo 'Correct answer='.$_SESSION["Answer.$i"].'<br>';



		print '<form action="exam.php" method="post">';
		//BEGINNING OF QUESTION ONE 
//echo $_POST["'answer$i'"];
		echo $_SESSION["Question.$i"];
	//	echo $_POST["'answer$i'"];
		if ($_POST["answer$i"]=="A")
			print "<input type='radio' checked='checked' name='answer$i' value='A'/>$var11<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='A'/>$var11<br/>";

		if ($_POST["answer$i"]=="B")
			print "<input type='radio' checked='checked' name='answer$i' value='B'/>$var22<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='B'/>$var22<br/>";

		if ($_POST["answer$i"]=="C")
			print "<input type='radio' checked='checked' name='answer$i' value='C'/>$var33<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='C'/>$var33<br/>";

		if ($_POST["answer$i"]=="D")
			print "<input type='radio' checked='checked' name='answer$i' value='D'/>$var44<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='D'/>$var44<br/>";

		/*if ($_POST["'answer$i'"]=="B")
		  print '<input type="radio" checked="checked" name="answer$i" value="B"/>Nairobi<br/>';
		  else
		  print '<input type="radio" name="answer$i" value="C"/>Nairobi<br/>';
		  if ($_POST["'answer$i'"]=="C")
		  print '<input type="radio" checked="checked" name="answer$i" value="C"/>Mombasa<br/>';
		  else
		  print '<input type="radio" name="answer$i" value="C"/>Mombasa<br/>';
		  if ($_POST["'answer$i'"]=="D")
		  print '<input type="radio" checked="checked" name="answer$i" value="D"/>Cairo<br/>';
		  else
		  print '<input type="radio" name="answer$i" value="D"/>Cairo<br/></p>';
		*/ 
		if($_POST["answer$i"]==$_SESSION["Answer.$i"])
			$correct++;

		$i++;

	}



	//foreach ($_POST as $value){
	//if (isset ($value)){
	//$done++;
	//}
	//}
	//if ($done !=3)
 //	print '<input type="submit" name="submit" value="check answers" /><br/><br/>';
	//if (($done > 0)&&($done < 3))
	//print 'You haven&#8217;t answered all the questions. Please finish the quiz and re-submit your answers.';
	//if($done==3)
	//{
	//if ($correct==0)
	//	$correct="0";
	print "Your score is $correct/2.<br/><br/>";
	//print 'The correct answers: (1) Cairo&nbsp;&nbsp; (2) Tegucigalpa&nbsp;&nbsp; (3) Phnom Penh';
	//}
	print '</form>';

	session_destroy(); 


}




else {

















	$query="CREATE TEMPORARY TABLE IF NOT EXISTS temp AS (SELECT * FROM Question_bank ORDER BY RAND() limit 4)";

	$query_run = mysql_query($query) ;
	//$query_num_rows= mysql_num_rows($query_run);

	if($query_run){

		$query2="SELECT * FROM temp ";

		$query_run2 = mysql_query($query2) ;

		$query_num_rows2= mysql_num_rows($query_run2);

		if($query_num_rows2==2){

			echo 'value selected';
		}else{ echo 'value not selected from temp';}


	}else { echo 'table not created';}




	$i=1;
	while($query_row2= mysql_fetch_assoc($query_run2)){      

		$_SESSION["Answer.$i"]=$query_row2['Answer'];
		$_SESSION["Question.$i"]=$query_row2['Question'];
//echo 'Correct answer='.$_SESSION["Answer.$i"];
//echo 'sr no is'.$query_row2['Sr_no'];

$var=$query_row2['Sr_no'];
//echo $var;

  $query3= " SELECT * FROM `Option` WHERE  `Sr_no` = '$var' "; 
  $query_run3 = mysql_query($query3);
 echo mysql_error();
if($query_run3)
//echo ' runned';
   



 $query_num_rows3= mysql_num_rows($query_run3);
   
    if($query_num_rows3==1){

              // echo 'successfully entered';
		
		$query_row3= mysql_fetch_assoc($query_run3);

		$_SESSION["Option_A.$i"]=$query_row3['Option_A'];
		$_SESSION["Option_B.$i"]=$query_row3['Option_B'];
		$_SESSION["Option_C.$i"]=$query_row3['Option_C'];
		$_SESSION["Option_D.$i"]=$query_row3['Option_D'];

		$var1=$_SESSION["Option_A.$i"];
                $var2=$_SESSION["Option_B.$i"];
		$var3=$_SESSION["Option_C.$i"];
                $var4=$_SESSION["Option_D.$i"];



//echo 'QQQQQQQQQQQ'. $_SESSION["Option_C.$i"];
}
else {  echo 'query not run';}



               
                 print '<form action="exam.php" method="post">';
		//BEGINNING OF QUESTION ONE 
		echo $query_row2['Question'].'</br>';
	//	if ($_POST["answer$i"]=="A")
	//		print "<input type='radio' checked='checked' name='answer$i' value='A'/>Alexandria<br/>";
	//	else
			print "<p><input type='radio' name='answer$i' value='A'/>A- $var1<br/>";

	//	if ($_POST["answer$i"]=="B")
	//		print "<input type='radio' checked='checked' name='answer$i' value='B'/>Alexandria<br/>";
	//	else
			print "<p><input type='radio' name='answer$i' value='B'/>$var2<br/>";

//		if ($_POST["answer$i"]=="C")
//			print "<input type='radio' checked='checked' name='answer$i' value='C'/>Alexandria<br/>";
//		else
			print "<p><input type='radio' name='answer$i' value='C'/>$var3<br/>";

//		if ($_POST["answer$i"]=="D")
//			print "<input type='radio' checked='checked' name='answer$i' value='D'/>Alexandria<br/>";
//		else
			print "<p><input type='radio' name='answer$i' value='D'/>$var4<br/>";

		/*if ($_POST["'answer$i'"]=="B")
		  print '<input type="radio" checked="checked" name="answer$i" value="B"/>Nairobi<br/>';
		  else
		  print '<input type="radio" name="answer$i" value="C"/>Nairobi<br/>';
		  if ($_POST["'answer$i'"]=="C")
		  print '<input type="radio" checked="checked" name="answer$i" value="C"/>Mombasa<br/>';
		  else
		  print '<input type="radio" name="answer$i" value="C"/>Mombasa<br/>';
		  if ($_POST["'answer$i'"]=="D")
		  print '<input type="radio" checked="checked" name="answer$i" value="D"/>Cairo<br/>';
		  else
		  print '<input type="radio" name="answer$i" value="D"/>Cairo<br/></p>';
		 */
		$i++;
	}
  
	$_SESSION['check']=2;
	print '<input type="submit" name="submit" value="check answers" /><br/><br/>';
print "</form>";

}
?>
</body>
</html>
