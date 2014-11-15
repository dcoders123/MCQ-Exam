
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


while($query_row2 = mysql_fetch_assoc($query_run2)){

echo $query_row2['Question'].$query_row2['Answer'].'<br>';

}











/*


<?php
print '<form action="test1.php" method="post">';
//BEGINNING OF QUESTION ONE 
print '<p>(1) The capital of Egypt is</p>';
if ($_POST['answer1']=="a")
print '<input type="radio" checked="checked" name="answer1" value="a"/>Alexandria<br/>';
else
print '<p><input type="radio" name="answer1" value="a"/>Alexandria<br/>';
if ($_POST['answer1']=="b")
print '<input type="radio" checked="checked" name="answer1" value="b"/>Nairobi<br/>';
else
print '<input type="radio" name="answer1" value="b"/>Nairobi<br/>';
if ($_POST['answer1']=="c")
print '<input type="radio" checked="checked" name="answer1" value="c"/>Mombasa<br/>';
else
print '<input type="radio" name="answer1" value="c"/>Mombasa<br/>';
if ($_POST['answer1']=="d"){
print '<input type="radio" checked="checked" name="answer1" value="d"/>Cairo<br/>';
$correct++;
}
else
print '<input type="radio" name="answer1" value="d"/>Cairo<br/></p>';




foreach ($_POST as $value){
if (isset ($value)){
$done++;
}
}
if ($done !=4)
print '<input type="submit" name="submit" value="check answers" /><br/><br/>';
if (($done > 0)&&($done < 4))
print 'You haven&#8217;t answered all the questions. Please finish the quiz and re-submit your answers.';
if($done==4){
if ($correct==0)
$correct="0";
print "Your score is $correct/3.<br/><br/>";
print 'The correct answers: (1) Cairo&nbsp;&nbsp; (2) Tegucigalpa&nbsp;&nbsp; (3) Phnom Penh';
}
print '</form>';
*/?>
    </body>
</html> 
