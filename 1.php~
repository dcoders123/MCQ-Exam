<?php

require '0.php';

$query="SELECT `food`,`calories` FROM `food` WHERE `healthy_unhealthy`='h' AND `calories`='200' ORDER BY `id`";
if($query_run = mysql_query($query)){

   if(mysql_num_rows($query_run)==NULL){
echo 'No results found';
   }else{
    while($querry_row = mysql_fetch_assoc($query_run)){
	echo '<br>';
	$food = $querry_row['food'];
	$calories=$querry_row['calories'];

	echo $food.'has'.$calories.'calories.<br>';


	}
   }

}else{

echo  mysql_error();
}
?>
