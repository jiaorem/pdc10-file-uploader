<?php
include "Registration.php";

$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>PDC10 Registration</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 100px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[$records-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <?php if (!is_null($success)): ?>
        <div class="alert alert-success" role="alert">
            Your registration has been saved
        </div>
        <?php endif ?>

        <?php if (!is_null($error)): ?>
        <div class="alert alert-danger" role="alert">
            Unable to upload your file. Please insert an image type file.
        </div>
    <?php endif ?>
<div class="container-xl">
	<div class="table table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Registrations</b></h2>
					</div>
					<div class="col-sm-6">	
                        <form method="POST" action="register.php">
                            <button class="btn btn-success" style="margin-top:10px;">Add New Registration</button>
                        </form>				
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
                        <th scope="col">Complete Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Registered Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $retrievedRecord = Registration::retrieveRecord();
                    foreach($retrievedRecord as $records){
                ?>
            <tr>
                <th scope="row"><?php echo $records['id']?></th>
                <td><?php echo $records['complete_name']?></td>
                <td><?php echo $records['email']?></td>
                <td>
                    <?php
                    echo "<img width=100; height=100; src=" . $records['picture_path'] . ">";                 
                    ?>
                </td>
                <td><?php echo $records['registered_at']?></td>
            </tr>
            <?php } ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
</body>
</html>