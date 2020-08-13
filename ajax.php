<?
$dbn    = 'mysql:host=185.201.11.187;dbname=u919964947_pro';
$user   = 'u919964947_noha';
$pass   = 'Mn33454946';
$option =  array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);


try {
	$conn = new PDO($dbn, $user, $pass, $option);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
}

catch(PDOException $e) {
	
	echo 'Failed To Connect' . $e->getMessage();
	
}




if(isset($_POST['rating']))
{
	$name 			= $_POST['name'];
	$hr_code 		= $_POST['hr_code'];
	$rating 		= $_POST['rating'];
	
	
	$stmt = $conn->prepare("SELECT * FROM dolhar WHERE hr_code = ?");
	$stmt->execute(array($hr_code));
	$row = $stmt->fetch();

	$count = $stmt->rowCount();

	// if count > 0 this mean the database contain record about this username
	
	if ($count > 0 )
	{
		?>
			<h5>Sorry, This (HR Code) Has Done The Survey Before. </h5>

		<?php
	}
	else
	{
		
		$stmt = "INSERT INTO dolhar ( name, hr_code, rating,  Add_Date)
						VALUES('$name', '$hr_code', '$rating', now() )";

		$conn->exec($stmt);
		
		?>
			<h4>Thank You For Completing The Survey! <i class="fa fa-check-circle text-success"></i></h4>
	
		<?php
		
	}
	
	
}
else
{
	
		?>
			<h4>Sorry, You Should Choose Your Rating By Selecting one of (Emotions) </h4>
	
		<?php
}











?>
