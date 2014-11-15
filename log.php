 <!DOCTYPE HTML>

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










<html>
<head>
</head>
<link href="/lessons/css/bootstrap.css" rel="stylesheet">



<form  action="log.php" method="GET" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>ONLINE EXAM</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username">User Name</label>
  <div class="controls">
    <input id="username" name="username" placeholder="Your Username*" class="input-large" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Password</label>
  <div class="controls">
    <input id="password" name="password" placeholder="Your Password*" class="input-large" required="" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="login"></label>
  <div class="controls">
    <button id="login" name="login" class="btn btn-success">Login</button>
  </div>
</div>

</fieldset>
</form>
</html>




<?php

//if(isset($_GET['username'])&& !empty($_GET['username'])){


 
	$username=$_GET['username'];
	$password=$_GET['password'];


  $query2="SELECT * FROM Student WHERE User_id ='$username'"; 
  $query_run2 = mysql_query($query2) ;
$query_num_rows2= mysql_num_rows($query_run2);
  

 
    if($query_num_rows2>=1){


   
  $query3="SELECT  Password FROM Student WHERE Password='$password'"; 
  $query_run3 = mysql_query($query3) ;
$query_num_rows3= mysql_num_rows($query_run3);
   
    if($query_num_rows3>=1){

		echo 'LOGGED IN SUCCESSFULLY';
$user_id=mysql_result($query_run2,0,'User_id');     
        
	 $query4="SELECT  Identity FROM Student WHERe User_id ='$username'"; 
  $query_run4 = mysql_query($query4) ;
$query_row4= mysql_fetch_assoc($query_run4);      
       
 $identity=$query_row4['Identity'];



if($identity=='Faculty'){
echo'Faculty'.'<br>';

echo '<a href="Question.php">ADD QUESTION</a>'.'<br>';

echo '<a href="Question.php">DELETE QUESTION</a>'.'<br>';
echo '<a href="Question.php">SEE QUESTION BANK</a>'.'<br>';

}else {
echo'Student'.'<br>';

echo '<a href="result.php">SEE RESULT</a>'.'<br>';
echo $user_id.'<br>';
$_SESSION["User_id"]=$user_id;
echo $_SESSION["User_id"];

echo '<a href="exam.php">GIVE EXAM</a>'.'<br>';



}
/*


if()


<html>
<head>
</head>
<link href="/lessons/css/bootstrap.css" rel="stylesheet">
<body>


<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend class="text-center">FOR STUDENTS</legend>



<center><a href="/lessons/log.php">SEE LAST RESULTS</a><br><br>

<a href="/lessons/register.php">GIVE EXAM</a><br><br>


</fieldset>
</form>
</body>
</html>


*/






     
     }else{  echo 'PASSWORD INVALID';}
		



}else{    

echo 'USER_NAME NOT VALID';
}
//}

?>
</div>


