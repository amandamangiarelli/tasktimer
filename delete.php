<?php
	// include database connection
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
		// get record ID
		// isset() is a PHP function used to verify if a value is there or not
		$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
	 
		// delete query
		$query = "DELETE FROM tasktimer WHERE id = ?";
		$stmt = $con->prepare($query);
		$stmt->bindParam(1, $id);
		 
		if($stmt->execute()){
			// redirect to read records page and 
			// tell the user record was deleted
			header('Location: index.php?action=deleted');
		}else{
			//die('Unable to delete record.');
			header('Location: index.php?action=delFail');
		}
	}
 
	// show error
	catch(PDOException $exception){
		die('ERROR: ' . $exception->getMessage());
	}
?>