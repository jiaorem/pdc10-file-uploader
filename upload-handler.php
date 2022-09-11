<?php

include "Registration.php";

$dsn = "mysql:host=localhost;dbname=pdc10_db";
$user = "micohyabut";
$passwd = "123456";

$pdo = new PDO($dsn, $user, $passwd);

$result = Registration::handleUpload($_FILES['picture_path']);

if ($result == "error"){
	header('Location: index.php?error=' . "error file type");
}
else{
	if ($result !== FALSE) {
		try{ 
			// Save the uploaded file to DB. File name as the label
			$encr_pass = Registration::encryptPass($_POST['password']);
			$registerObj = new Registration($_POST['complete_name'], $_POST['email'], $encr_pass['password'], $result['save_picture_path']);
			$result = $registerObj->save();
			
			header('Location: index.php?success=1');
		}
		catch (Exception $e) {
			error_log($e->getMessage());
		}
	} 
	else {
	
		header('Location: index.php?error=' . $e->getMessage());
	
	}

}
?>