<?php
	
	try {
		//
		$con = new PDO("mysql:host=localhost;dbname=mentorweb", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
						   
		if (isset($_POST['submitRegister'])) {			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			if (checkIfUserExists($_POST['username']) == 0) {
		    	adduser($username, $password, $firstName, $lastName, $isMentor, $isMentee, $isLookingForMatch);
				header('Location: profilePage.html');
			}	
						   echo "made it this far";
		} 
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}
	
function addUser($username, $password, $firstName, $lastName, $isMentor, $isMentee, $isLookingForMatch) {
	global $con;
	$sql = "
		INSERT INTO userData (username, password, firstName, lastName, mentor, mentee, lookingForMatch)
		VALUES (:username, :password, :firstName, :lastName, :isMentor, :isMentee, :isLookingForMatch)";
	$q = $con->prepare($sql);
	$q->execute(array(':username'=>$username,
					  ':password'=>$password,
					  ':firstName'=>$firstName,
					  ':lastName'=>$lastName,
					  ':isMentor'=>$isMentor,
					  ':isMentee'=>$isMentee,
					  ':isLookingForMatch'=>$isLookingForMatch));
}

function checkIfUserExists($username) {
	global $con;
	$sql = "
			SELECT * 
			FROM userData
			WHERE username=:username
			LIMIT 1";
	$q = $con->prepare($sql);
	$q->execute(array(':username' => $username));
	$rows = $q->fetchAll(PDO::FETCH_ASSOC);
	if (count($rows) == 0) {
		return 0;
	} else {
		return 1;
	}
}
?>

