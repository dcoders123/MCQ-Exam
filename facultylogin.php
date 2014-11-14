<?php
session_start();
$loginid = $_SESSION["loginid"];
if($loginid=='')
{
	header("Location:mbox/sessionexpired.php");
}
$conn_error ='could not connect.';

$mysql_host ='localhost';
$mysql_user ='root';
$mysql_pass ='';

$mysql_db ='Online_Exam';


if(!mysql_connect ($mysql_host, $mysql_user , $mysql_pass) || !mysql_select_db($mysql_db)){

	die($conn_error);

}

if(isset($_POST['serial']))
{
	$serial=$_POST['serial'];
	
	$query1="delete from `online_exam`.`option` where `Sr_no`=$serial"; 
	$query_run1 = mysql_query($query1) ;
	$query2="delete from `online_exam`.`question_bank` where `Sr_no`=$serial"; 
	$query_run2 = mysql_query($query2) ;
	
	header("Location:mbox/questiondeleted.php");
		
}
if(isset($_POST['question']))
{
	$question=$_POST['question'];
	$optiona=$_POST['optiona'];
	$optionb=$_POST['optionb'];
	$optionc=$_POST['optionc'];
	$optiond=$_POST['optiond'];
	$answer=$_POST['answer'];

	$query1="insert into question_bank (Question,Answer) values('$question','$answer')"; 
	$query_run1 = mysql_query($query1) ;
	$query2="INSERT INTO `online_exam`.`option` (`Option_A`, `Option_B`, `Option_C`, `Option_D`) VALUES ('$optiona','$optionb','$optionc','$optiond')"; 
	$query_run2 = mysql_query($query2) ;

	header("Location:mbox/questionadded.php");
	
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
	<link href="css/table.css" rel="stylesheet">
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
                        <a class="page-scroll" href="#questionbank">Question Bank</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#register">Add Question</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#login">Delete Question</a>
                    </li>
                    <li>
                        <a href="home.php">Logout</a>
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
                <div style="color: #185875" class="intro-lead-in">Online MCQ Exam!</div>
				<style>
				h6{
				color: #185875;
				font-size:50px;
				}
				</style>
                <h6>Welcome, <?php echo"$loginid";?>(Faculty)</h6>
                <a href="#questionbank" class="page-scroll btn btn-xl">Question Bank</a>
            </div>
        </div>
    </header>


    <!-- Question Bank -->
	
<section id="questionbank">


        
        
    <center><h1><span class="blue">Question Bank</span></h1></center>


    <table class="container">
        <thead>
            <tr>
                <th><h1>Serial no.</h1></th>
                <th><h1>Question</h1></th>
                <th><h1>Answer</h1></th>
                <th><h1>Option A</h1></th>
				<th><h1>Option B</h1></th>
				<th><h1>Option C</h1></th>
				<th><h1>Option D</h1></th>
            </tr>
        </thead>
        <tbody>
		<?php
		$query="SELECT `question_bank`.`Sr_no`,`Question`,`Answer`,`Option_A`,`Option_B`,`Option_C`,`Option_D` from `question_bank`,`option` where `question_bank`.`Sr_no`=`option`.`Sr_no` "; 
		$query_run = mysql_query($query) ;
		while($query_row= mysql_fetch_array($query_run))  
		{
			echo"<tr>";
            echo"<td>".$query_row['Sr_no']."</td>";
            echo"<td>".$query_row['Question']."</td>";
            echo"<td>".$query_row['Answer']."</td>";
            echo"<td>".$query_row['Option_A']."</td>";
			echo"<td>".$query_row['Option_B']."</td>";
			echo"<td>".$query_row['Option_C']."</td>";
			echo"<td>".$query_row['Option_D']."</td>";
            echo"</tr>";
			}
	?>
        </tbody>
    </table>        
           
				
        
	

    </section>

    <!-- Add question -->
    <section id="register" class="bg-light-gray">
	<form action="facultylogin.php" method="post" name="addForm" id="addForm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
				<style>
				h2{
				color:black;
				}
				</style>
                    <h2 class="section-heading">Add Question</h2><br>
                </div>
            </div>
             <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 12px;
								color:black;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="question">Question:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Question*"  name="question" id="question" required data-validation-required-message="Please enter your question.">
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
                        <label class="control-label" for="optiona">Option A:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Option A*" name="optiona" id="optiona" required data-validation-required-message="Please enter your Option A.">
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
                        <label class="control-label" for="optionb">Option B:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Option B*" name="optionb" id="optionb" required data-validation-required-message="Please enter your Option B.">
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
                        <label class="control-label" for="optionc">Option C:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Option C*" name="optionc" id="optionc" required data-validation-required-message="Please enter your Option C.">
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
                        <label class="control-label" for="optiond">Option D:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Option D*" name="optiond" id="optiond" required data-validation-required-message="Please enter your Option D.">
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
                        <label class="control-label" for="answer">Answer:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="answer" name="answer" class="form-control">
                                <option>A</option>
                                <option>B</option>
								<option>C</option>
								<option>D</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button type="submit" class="btn btn-xl">Add Question</button>
                </div>
            
        </div>
		</form>
    </section>
    <!-- Delete question -->
    <section id="login" class="bg-light-gray">
	<form action="facultylogin.php" method="post" name="addForm" id="addForm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
				<style>
				h2{
				color:black;
				}
				</style>
                    <h2 class="section-heading">Delete Question</h2><br>
					<style>
					h4{
					position:relative;
					bottom:40px;
					}
					</style>
					<h4>(For serial no. refer question bank)</h4>
                </div>
            </div>
             <div class="row">
                    <div class="col-md-6">
                        <style>
                            label {
                                position: relative;
                                left: 400px;
                                top: 30px;
								color:black;
                                font-size: 25px;
                                text-transform: uppercase;
                                font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
                                font-weight: 700;
                            }
                        </style>
                        <label class="control-label" for="serial">Serial no.:</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Serial No.*"  name="serial" id="serial" required data-validation-required-message="Please enter your serial no.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
					<style>
					button{
					position:relative;
					top:15px;
					}
					</style>
                    <button type="submit" class="btn btn-xl">Delete Question</button>
                </div>
            
        </div>
		</form>
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
