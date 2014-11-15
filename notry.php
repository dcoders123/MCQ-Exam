
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
echo 'here';


	$correct=0;
	$i=1;
	while($i<3){      



		echo 'Given answer='.$_POST["answer$i"].'Correct answer='.$_SESSION["Answer.$i"].'<br>';



		print '<form action="notry.php" method="post">';
		//BEGINNING OF QUESTION ONE 
//echo $_POST["'answer$i'"];
		echo $_SESSION["Question.$i"];
	//	echo $_POST["'answer$i'"];
		if ($_POST["answer$i"]=="A")
			print "<input type='radio' checked='checked' name='answer$i' value='A'/>Alexandria<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='A'/>Alexandria<br/>";

		if ($_POST["answer$i"]=="B")
			print "<input type='radio' checked='checked' name='answer$i' value='B'/>Alexandria<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='B'/>Alexandria<br/>";

		if ($_POST["answer$i"]=="C")
			print "<input type='radio' checked='checked' name='answer$i' value='C'/>Alexandria<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='C'/>Alexandria<br/>";

		if ($_POST["answer$i"]=="D")
			print "<input type='radio' checked='checked' name='answer$i' value='D'/>Alexandria<br/>";
		else
			print "<p><input type='radio' name='answer$i' value='D'/>Alexandria<br/>";

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






	$query="CREATE TEMPORARY TABLE IF NOT EXISTS temp AS (SELECT * FROM Question_bank ORDER BY RAND() limit 2)";

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
echo 'Correct answer='.$_SESSION["Answer.$i"];

               
                 print '<form action="notry.php" method="post">';
		//BEGINNING OF QUESTION ONE 
		echo $query_row2['Question'];
	//	if ($_POST["answer$i"]=="A")
	//		print "<input type='radio' checked='checked' name='answer$i' value='A'/>Alexandria<br/>";
	//	else
			print "<p><input type='radio' name='answer$i' value='A'/>Alexandria<br/>";

	//	if ($_POST["answer$i"]=="B")
	//		print "<input type='radio' checked='checked' name='answer$i' value='B'/>Alexandria<br/>";
	//	else
			print "<p><input type='radio' name='answer$i' value='B'/>Alexandria<br/>";

//		if ($_POST["answer$i"]=="C")
//			print "<input type='radio' checked='checked' name='answer$i' value='C'/>Alexandria<br/>";
//		else
			print "<p><input type='radio' name='answer$i' value='C'/>Alexandria<br/>";

//		if ($_POST["answer$i"]=="D")
//			print "<input type='radio' checked='checked' name='answer$i' value='D'/>Alexandria<br/>";
//		else
			print "<p><input type='radio' name='answer$i' value='D'/>Alexandria<br/>";

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
