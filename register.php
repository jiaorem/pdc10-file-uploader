<?php
$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Registration Form</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

<?php if (!is_null($success)): ?>
  <div class="alert alert-success" role="alert">
    Your file was successfully uploaded
  </div>
  <?php endif ?>

  <?php if (!is_null($error)): ?>
  <div class="alert alert-danger" role="alert">
    Unable to upload your file
  </div>
  <?php endif ?>

<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <h1 class="text-white mb-4">PDC10 - File Uploader</h1>

        <form action="upload-handler.php" enctype="multipart/form-data" method="POST">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Complete Name</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="text" name="name" id="name" class="form-control form-control-lg" required/>
              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Email address</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Password</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input class="form-control" name="password" id="password" rows="3" type="password" required></input>
              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Confirm Password</h6>
              </div>
              <div class="col-md-9 pe-5">
              <input class="form-control" name="confpassword" id="confpassword" rows="3" type="password" required></input>
              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Picture</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input class="form-control form-control-lg" name="picture" id="picture" type="file" required/>
              </div>
            </div>

            <hr class="mx-n3">
            <div class="px-5 py-4">
              <button type="submit" class="btn btn-primary btn-lg">Submit Registration</button>
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
