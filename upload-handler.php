<?php

include "Registration.php";

$dsn = "mysql:host=localhost;dbname=pdc10_db";
$user = "yabutmicoh";
$passwd = "123456";

$pdo = new PDO($dsn, $user, $passwd);

$result = Registration::handleUpload($_FILES['picture']);

if ($result !== FALSE) {

	// Save the uploaded file to DB. File name as the label
	$registrationObj = new Registration(['name'],['email'],['password'], $result['path'], $result['type']);
	var_dump($registrationObj);
	exit;
	$result = $registrationObj->save();

	header('Location: index.php?success=1');

} else {

	header('Location: index.php?error=' . $e->getMessage());

}