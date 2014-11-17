<?php

$conn_error ='could not connect.';

$mysql_host ='localhost';
$mysql_user ='root';
$mysql_pass ='';

$mysql_db ='Online_Exam';


if(!mysql_connect ($mysql_host, $mysql_user , $mysql_pass) || !mysql_select_db($mysql_db)){

	die($conn_error);

}

if(isset($_POST['loginid'])){

	
	$loginid=$_POST['loginid'];
	$password=$_POST['password'];
	session_start();
	$_SESSION["loginid"] = $loginid;

	$query2="SELECT * FROM Student WHERE User_id ='$loginid'"; 
	$query_run2 = mysql_query($query2) ;
	$query_num_rows2= mysql_num_rows($query_run2);
	

	
	if($query_num_rows2>=1){

		$query3="SELECT  Password FROM Student WHERE Password='$password'"; 
		$query_run3 = mysql_query($query3) ;
		$query_num_rows3= mysql_num_rows($query_run3);
		
		if($query_num_rows3>=1){

			$query4="SELECT  Identity FROM Student WHERe User_id ='$loginid'"; 
			$query_run4 = mysql_query($query4) ;
			$query_row4= mysql_fetch_assoc($query_run4);      
			
			$identity=$query_row4['Identity'];
			if($identity=='Faculty'){
				
				header("Location: facultylogin.php"); 

				echo '<a href="Question.php">ADD QUESTION</a>'.'<br>';

				echo '<a href="Question.php">DELETE QUESTION</a>'.'<br>';
				echo '<a href="Question.php">SEE QUESTION BANK</a>'.'<br>';

			}else {
				header("Location: studentlogin.php"); /* Redirect browser */

				echo '<a href="result.php">SEE RESULT</a>'.'<br>';
				echo '<a href="exam.php">GIVE EXAM</a>'.'<br>';

			}

			
		}else{header("Location: mbox/passwordinvalid.php");}
		



	}else{header("Location: mbox/logininvalid.php");}

}


if(isset($_POST['loginid1'])){
	$firstname1=$_POST['firstname1'];
	$lastname1=$_POST['lastname1'];
	$identity=$_POST['identity'];
	$loginid1=$_POST['loginid1'];
	$password1=$_POST['password1'];



	$query="INSERT INTO Student VALUES('".mysql_real_escape_string($firstname1)."','".mysql_real_escape_string($lastname1)."','".mysql_real_escape_string($loginid1)."','".mysql_real_escape_string($password1)."','".mysql_real_escape_string($identity)."')";
	if($query_run = mysql_query($query))   {

		
		header("Location:mbox/registersuccess.php");

	}
	else{

		header("Location:mbox/registerfail.php");
	}

}

?>



<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Online MCQ Exam</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Online MCQ Exam</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#login">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#register">Register</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div style="color: #185875" class="intro-lead-in">Welcome To The Online MCQ Exam!</div>
                <div style="color: #185875" class="intro-heading">Enter if you dare!</div>
                <a href="#login" class="page-scroll btn btn-xl">Login</a>
            </div>
        </div>
    </header>


    <!-- Login Section -->
<section id="login">
<form action="home.php" method="post" name="loginForm" id="loginForm">

        <div class="container">
            
                
				<div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Login</h2><br><br>
                    </div>
                   <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
							    position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="loginid">Login ID:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Login ID*" name="loginid" id="loginid" required data-validation-required-message="Please enter your login id.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
							                                position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="password">Password:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password*"  name="password" id="password" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button type="submit" class="btn btn-xl">Login</button>
                    </div>
                
            </div>
        </div>
	</form>

    </section>

    <!-- Register Section -->
    <section id="register" class="bg-light-gray">
	<form action="home.php" method="post" name="registerForm" id="registerForm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Register</h2><br>
                </div>
            </div>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="firstname1">First Name:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your First Name*"  name="firstname1" id="firstname1" required data-validation-required-message="Please enter your first name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="lastname1">Last Name:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Last Name*" name="lastname1" id="lastname1" required data-validation-required-message="Please enter your last name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="loginid1">Login ID:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Login ID*" name="loginid1" id="loginid1" required data-validation-required-message="Please enter your login id.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="password1">Password:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password*" name="password1" id="password1" required data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 12px;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="identity">Identity:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="identity" name="identity" class="form-control">
                                <option>Faculty</option>
                                <option>Student</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success1"></div>
                    <button type="submit" class="btn btn-xl">Register</button>
                </div>
            
        </div>
		</form>
       
    </section>
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2014</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Finally, we have started from 1st November 2014 to give shape to our website whithin days our website came into existence. </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>15 November 2014</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Today we completed our website and the initial version ready to use.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2020</h4>
                                    <h4 class="subheading">Our future plans</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We will extend the website to larger scale, our next version will include a more robust design and many more features.</p>
                                </div>
                            </div>
                        </li>
                        
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>
                                    Be Part
                                    <br>Of Our
                                    <br>Story!
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">

                        <h4>Ayush Garg</h4>
                        <p class="text-muted">Lead Designer</p>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        
                        <h4>Ritesh Kumar</h4>
                        <p class="text-muted">Lead Coder</p>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        
                        <h4>Shivansh Sapra</h4>
                        <p class="text-muted">Assistant coder and designer</p>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
				   <p class="large text-muted">With the co-ordination of our team members finally we are able to make such a good website.</p>
                </div>
            </div>
        </div>
    </section>

 <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <!--<script src="js/contact_me.js"></script>-->
    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
</body>

</html>







