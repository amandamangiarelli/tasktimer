<?php
	header('Access-Control-Allow-Origin: *');
	// get passed parameter value, in this case, the record ID
	// isset() is a PHP function used to verify if a value is there or not
	$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
	 
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
	 
	// read current record's data
	try {
		// prepare select query
		$query = "SELECT id, name, description FROM tasktimer WHERE id = ? LIMIT 0,1";
		$stmt = $con->prepare( $query );
		 
		// this is the first question mark
		$stmt->bindParam(1, $id);
		 
		// execute our query
		$stmt->execute();
		 
		// store retrieved row to a variable
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		 
		// values to fill up our form
		$name = $row['name'];
		$description = $row['description'];
	}
	 
	// show error
	catch(PDOException $exception){
		die('ERROR: ' . $exception->getMessage());
	}
?>
 
<!--UPDATE-->
<?php
	// check if form was submitted
	if($_POST){
	 
	try{
		// write update query
		// in this case, it seemed like we have so many fields to pass and 
		// it is better to label them and not use question marks
		$query = "UPDATE tasktimer 
					SET name=:name, description=:description 
					WHERE id = :id";

		// prepare query for excecution
		$stmt = $con->prepare($query);

		// posted values
		$name=htmlspecialchars(strip_tags($_POST['name']));
		$description=htmlspecialchars(strip_tags($_POST['description']));

		// bind the parameters
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':id', $id);
		 
		// Execute the query
		if($stmt->execute()){
			$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
			header("Location: timer.php?id=".$id);
		}else{
			echo "Error";
		} 
	}
	 
	// show errors
	catch(PDOException $exception){
		die('ERROR: ' . $exception->getMessage());
	}
	}

	$action = isset($_GET['action']) ? $_GET['action'] : "";
?>

<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
        <link rel="stylesheet" href="css/index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<title>Task Timer</title>
	</head>
		<body>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
			<div class="task-form" style="background: #9AB1DD;">
				<span class="subject">Edit Task</span>
					<div class="title">
						<label for="name">Task Title*:</label>
						<textarea id="name" name="name" rows="1" col="1"><?php echo htmlspecialchars($name, ENT_QUOTES);  ?></textarea>
					</div>
					<div class="description">
						<label for="description">Description:</label>
						<textarea name="description" id="description"><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea>
					</div>
					<button type="submit" value="submit" id="save" >Save</button>
			</form>
			<div onclick="goBack()" class="cross-btn">
				<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="16.3215" y1="1.06066" x2="2.06068" y2="15.3215" stroke="#253147" stroke-width="3"/>
					<line x1="15.9393" y1="15.3215" x2="1.67849" y2="1.06068" stroke="#253147" stroke-width="3"/>
				</svg>
			</div>
		</div>
	  </body>
	  <script>
		function goBack() {
			window.history.back();
		}
	  </script>
</html>
