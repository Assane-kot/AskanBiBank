
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ASKAAN BI BANQUE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Theme style -->

  <link rel="stylesheet" href="vue/css/groupe3.css">
</head>
<body class="hold-transition login-page">
<form action="controller/auth.php" method="POST">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>ASKAAN BI BANQUE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">OUVRIR VOTRE SESSION</p>

      
        <div class="input-group mb-3">
          <input type="nom" class="form-control" placeholder="Login" required name="login">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="material-icons">person</span>
              
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required  name="psw">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="material-icons">lock</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Se Souvenir 
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
             <div >
             
             <input type="submit" class="btn btn-primary btn-user btn-block" id='submit' value='LOGIN'  name='cnx' >
             </a>
            </div>
            
          </div>
          <!-- /.col -->
        </div>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</form>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
