
<?php

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
<form  action="register.php" method="GET" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>REGISTER</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="firstname">First Name</label>
  <div class="controls">
    <input id="firstname" name="firstname" placeholder="Your First Name*" class="input-large" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lastname">Last Name</label>
  <div class="controls">
    <input id="lastname" name="lastname" placeholder="Your Last Name*" class="input-large" required="" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="identity">Identiy</label>
  <div class="controls">
    <select id="identity" name="identity" class="input-large">
      <option>Faculty</option>
      <option>Student</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username2">User Name</label>
  <div class="controls">
    <input id="username2" name="username2" placeholder="Your Username*" class="input-large" required="" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password2">Password</label>
  <div class="controls">
    <input id="password2" name="password2" placeholder="Your Password*" class="input-large" required="" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="register"></label>
  <div class="controls">
    <button id="register" name="register" class="btn btn-success">Register</button>
  </div>
</div>

</fieldset>
</form>

</html>





<?php

//if(isset($_GET['prog_code'])&& !empty($_GET['prog_code'])){


 
	$firstname=$_GET['firstname'];
	$lastname=$_GET['lastname'];
	$identity=$_GET['identity'];
	$username2=$_GET['username2'];
	$password2=$_GET['password2'];


 
	$query="INSERT INTO Student VALUES('".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($username2)."','".mysql_real_escape_string($password2)."','".mysql_real_escape_string($identity)."')";
	if($query_run = mysql_query($query))   {

   		echo 'Successfully Registered';

		}
	else{
	
           echo 'Failed';
	}
     
     //else{  echo 'PROGRAM CODE INVALID';}
	
?>









