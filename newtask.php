<?php
	if($_POST){
	header('Access-Control-Allow-Origin: *');
			 
	//include database connection
	// used to connect to the database
	$host = "";
	$db_name = "";
	$username = "";
	$password = "";
	  
	try {
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	}
	  
	// show error
	catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
	}


	try {
		// insert query
		$query = "INSERT INTO tasktimer SET name=:name, description=:description";

		// prepare query for execution
		$stmt = $con->prepare($query);

		// posted values
		$name=htmlspecialchars(strip_tags($_POST['name']));
		$description=htmlspecialchars(strip_tags($_POST['description']));

		// bind the parameters
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		 
		// Execute the query
		if($stmt->execute()){
			//echo "<div class='alert alert-success'>Record was saved.</div>";
			header('Location: index.php?action=new');
		}else{
			//echo "<div class='alert alert-danger'>Unable to save record.</div>";
			header('Location: index.php?action=newFail');
		} 
	}
	 
	// show error
	catch(PDOException $exception){
		die('ERROR: ' . $exception->getMessage());
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <link rel="stylesheet" href="css/index.css">
		<script src="js/jquery.js"></script>
		<style>
		html, body{
			background-image: linear-gradient(#D8E1F1, #D8E1F1, #C2C1C1);
		}
			@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap');
			@import url('https://fonts.googleapis.com/css2?family=PT+Serif&display=swap');
		</style>
		<title>Task Timer</title>
	</head>
	<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="task-form" style="background: #D8E1F1;">
			<span class="subject">Add New Task</span>
				<div class="title">
					<label for="name">Task Title*:</label>
					<textarea id="name" name="name" rows="1" col="1"></textarea>
				</div>
				<div class="description">
					<label for="description">Description:</label>
					<textarea name="description" id="description"></textarea>
				</div>
				
			<button type="submit" value="submit" id="save" >Create</button>

			</form>
			<div onclick="location.href='index.php';" class="cross-btn">
				<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="16.3215" y1="1.06066" x2="2.06068" y2="15.3215" stroke="#253147" stroke-width="3"/>
					<line x1="15.9393" y1="15.3215" x2="1.67849" y2="1.06068" stroke="#253147" stroke-width="3"/>
				</svg>
			</div>
		</div>
	<script src="js/index.js"></script>
	</body>
</html>

<!-- USE HTTPS AND 10.0.2.2 ON ANDROID -->