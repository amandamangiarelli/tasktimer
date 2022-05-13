<!--UPDATE-->
<?php
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

	// check if form was submitted
	if($_POST){
		try{
			// write update query
			$query = "UPDATE tasktimer SET time=:time WHERE id=:id";
	 
			// prepare query for excecution
			$stmt = $con->prepare($query);
	 
			// posted values
			$id=htmlspecialchars(strip_tags($_POST['id']));
			$time=htmlspecialchars(strip_tags($_POST['time']));
	 
			// bind the parameters
			$stmt->bindParam(':time', $time);
			$stmt->bindParam(':id', $id);
			 
			// Execute the query
			if($stmt->execute()){
				header("Location: index.php?action=savedTime");
			}else{
				echo "Location: index.php?action=savedTimeFail";
			}
		}
		// show errors
		catch(PDOException $exception){
			die('ERROR: ' . $exception->getMessage());
		}
	}

	$action = isset($_GET['action']) ? $_GET['action'] : "";

?>