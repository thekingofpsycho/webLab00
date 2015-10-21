<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/pResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
		$a=0;
		if(empty($_POST['name'])||empty($_POST['id'])||empty($_POST['course'])||empty($_POST['grade'])||empty($_POST['credit_card'])||empty($_POST['visa'])){
		$a=2;
		}
		elseif (preg_match('/[a-zA-Z]/', $_POST['name'])==false){
		$a=1;		
		}
		elseif (strlen($_POST['credit_card'])!=16)
		{
		$a=3;
		}
		elseif (strlen(($_POST['visa']=="Visa"&&$_POST['credit_card'][0]!=4))||(($_POST['visa']=="MasterCard"&&$_POST['credit_card'][0]!= 5))){
		$a=4;
		}		
		if($a==1){?>

		<h1>Sorry</h1>
		<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>
		<?php }
		elseif($a==2){?>
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
			
		<?php }
		elseif($a==3){
		?>		
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

		<?php
		}
		else{
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<?php 
			if($name = isset($_POST['name']))
				$name= $_POST['name'];
			if($name = isset($_POST['id']))
				$id=$_POST['id'];
			if($name = isset($_POST['course']))
				$course=$_POST['course'];
			if($name = isset($_POST['grade']))
				$grade=$_POST['grade'];
			if($name = isset($_POST['credit_card']))
				$credit_card=$_POST['credit_card'];
			if($name = isset($_POST['visa']))
				$visa=$_POST['visa'];
		?>
		<ul> 
			<li>Name: <?= $name ?></li>
			<li>ID: <?= $id ?> </li>
			<li>Course: <?= check($course); ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit <?= $credit_card ?></li>
		</ul>
		
		<?php
			$filename = "loosers.txt";
			 # For example, "Scott Lee;20110115238;4300523877775238;visa"
			file_put_contents($filename,$name.';'.$id.';'.$credit_card.';'.$visa."\n",FILE_APPEND);
		?>
		<pre>
		<?=file_get_contents($filename)?>
		</pre>
		<? } ?>
		<?php
			function check($name2){ 
				$course2 = '';
				foreach ($name2 as $course) {
					$course2 = $course2.','.$course;
				}
				$course2 = substr($course2, 1);
				return $course2;
			}
		?>
	</body>
</html>
