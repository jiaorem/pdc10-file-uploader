<?php
$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registration Form</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
        var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confPass').value) {
            document.getElementById('status').style.color = 'green';
            document.getElementById('status').innerHTML = 'matching';
        } else {
            document.getElementById('status').style.color = 'red';
            document.getElementById('status').innerHTML = 'Confirm Password Does Not Match';
        }
        }
        function check_pass() {
        if (document.getElementById('password').value ==
                document.getElementById('confPass').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
        }
    </script>
</head>

<body>

<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <h1 class="text-black mb-4">Registration Form</h1>

        <form action="upload-handler.php" enctype="multipart/form-data" method="POST">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">
                  <label for="complete_name"><h6 class="mb-0">Complete Name</h6></label>
                </div>
                <div class="col-md-9 pe-5">
                  <input type="text" name="complete_name" id="complete_name" class="form-control form-control-lg"required>
                </div>
              </div>

              <hr class="mx-n3">
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                <label for="email"><h6 class="mb-0">Email Address</h6></label>
                </div>
                <div class="col-md-9 pe-5">
                  <input type="email" name="email" id="email" class="form-control form-control-lg"required>
                </div>
              </div>

              <hr class="mx-n3">
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                  <label for="password"><h6 class="mb-0">Password</h6></label>
                </div>
                <div class="col-md-9 pe-5">
                  <input class="form-control" name="password" id="password" type="password" onkeyup='check_pass();' onkeyup='check()'required>
                </div>
              </div>

              <hr class="mx-n3">
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                  <label for="confPass"><h6 class="mb-0">Confirm Password</h6></label>
                </div>
                <div class="col-md-9 pe-5">
                <input class="form-control" name="confPass" id="confPass" type="password" onkeyup='check_pass();' onkeyup='check()' required>
                <span class="text-black" id='status'></span>
                </div>
              </div>

              <hr class="mx-n3">
              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                  <label for="picture_path"><h6 class="mb-0">Picture</h6></label>
                </div>
                <div class="col-md-9 pe-5">
                  <input class="form-control form-control-lg" name="picture_path" id="picture_path" type="file" required>
                </div>
              </div>

              <hr class="mx-n3">
              <div class="px-5 py-4">
                <button id="submit" type="submit" class="btn btn-primary btn-lg" style="background-color:#435d7d;" disabled><b>Submit Registration</b></button>
              </div>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>
</body>

</html>


