<?php
require_once ('../controller/Agencecontroller.php');
require_once ('../model/Agence.php');
//require_once ('../../controller/UpdateUser.php');
//include('../../controller/UserController.php');
$userData = new Agencecontroller();
$listeagence = $userData->getAgence();
session_start();
if(isset($_GET['idA'])) $agence = $userData->showAgence($_GET['idA']);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
        
    </div>
    <div class="sidebar-brand-text mx-3"> ASKANBI BANK </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../../index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

 <!-- MENU POUR SUPERADMIN -->

<?php
 //var_dump ($_SESSION['profil']);
 //die();

 //MENU QUI DOIT S AFFICER POUR UN PROFILE
 if ($_SESSION['role'] == 'Super-User') {

 
?>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a  href="admin.php" class="nav-link collapsed" href="#" 
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="material-icons">person</i>
        <span>ADMINISTRATEURS</span>
    </a>
    
</li>
<li class="nav-item">
    <a class="nav-link" href="ac-agence.php">
         <i class="material-icons">home</i>
        <span>AGENCES</span></a>
</li>

  <?php


 }

 ?>

  <!-- MENU POUR ADMINISTRATEUR-->
 <?php
  if ($_SESSION['role'] == 'Administrateur') {


 ?>
  
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#"  
        aria-expanded="true" aria-controls="collapseUtilities">
         <i class="material-icons">person</i>
        <span>AGENTS</span>
    </a>
    
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#"  
        aria-expanded="true" aria-controls="collapsePages">
         <i class="material-icons">person</i>
        <span>CLIENTS</span>
    </a>
    
</li>


 <?php

  }
?>

 <!-- MENU SEULEMENT POUR AGENT -->
<?php
  if ($_SESSION['role'] == 'Agent'){

  

 ?>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#"  
        aria-expanded="true" aria-controls="collapsePages">
         <i class="material-icons">person</i>
        <span>CLIENTS</span>
    </a>
    
</li>

<?php
  }
?>
 




<!-- MENU SEULEMENT POUR SUPER ADMIN -->

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_posting_photo.svg" alt="...">
                <p class="text-center mb-2"><strong>ASKANBI BANK </strong><br> Forger votre avenir avec notre banque</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Visiter Notre Site </a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    

                        <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <?php
                        if ($_SESSION['role'] == 'Super-User') {


                   ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">            
                            <a class="btn btn-success btn-sm" href="Ajouter-admin.php">AJOUTER ADMINISTRATEUR </a>
            
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">            
                            <a class="btn btn-success btn-sm" href="">LISTE ADMINISTRATEURS  </a>
            
                        </div>
                    <?php
                    
                        }
                    ?>    

                    <?php
                        if ($_SESSION['role'] == 'Administrateur') {


                   ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">            
                            <a class="btn btn-success btn-sm" href="ajouter-agence.php">CREATION AGENCE </a>
            
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">            
                            <a class="btn btn-success btn-sm" href="liste-admin.php">LISTE DES AGENCES</a>
            
                        </div>

                        <!-- Pending Requests Card Example -->
                    <?php
                        }

                    ?>   
                    </div>

                  <form action="../../controller/Useradd.php" method="post">
                    <!-- Content Row -->
                    <div class="aj-admin">
                       <div class="register-box">
                          <div class="card card-outline card-primary">
    
                            <div class="card-body">
                               <p class="login-box-msg">Ajouter un Administrateur</p>

                                    <form action="../../controller/UserController.php" method="post">
                                    <div class="input-group mb-3">
                                            <select name="idAgence">
                                               
                                                <?php 
                                                
                                               foreach ( $listeagence as $Agence ) 
                                               
                                               {?>

                                                <option value="<?php echo $Agence['idAgence']; ?>">  <?php echo $Agence['nomAgence']; ?></option>

                                               <?php
                                               }
                                               
                                                ?>
                                              
                                            </select>   
                                           
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                           <span class="material-icons">person</span>
                                                        </div>
                                                    </div>
        
                                        </div>
                                         <div class="input-group mb-3">
                                           <input type="text" class="form-control" placeholder="NOM" name="nom">
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                           <span class="material-icons">person</span>
                                                        </div>
                                                    </div>
        
                                        </div>
                                         <div class="input-group mb-3">
                                           <input type="text" class="form-control" placeholder="PRENOM" name="prenom">
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                          <span class="material-icons">person</span>
                                                        </div>
                                                    </div>
        
                                        </div>
                                         <div class="input-group mb-3">
                                           <input type="text" class="form-control" placeholder="ADRESSE" name="adresse" >
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                           <span class="material-icons">place</span>
                                                        </div>
                                                    </div>
        
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="TELEPHONE" name="tel">
                                                 <div class="input-group-append">
                                                        <div class="input-group-text">
                                                        <span class="material-icons">phone_iphone</span>
                                                          
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="input-group mb-3" >
                                         <select name="genre">
                                         <option value="typepiece"> CIN </option>
                                         <option value="typepiece"> PASSPORT</option>
                                         </select>
                                                 <div class="input-group-append">
                                                       <div class="input-group-text">
                                                       <span class="material-icons">face</span>
                                                        </div>
                                                 </div>
                                                    
                                        </div> 

                                        
                                        <div class="input-group mb-3">
                                           <input type="text" class="form-control" placeholder="NUMERO PIECE" name="numpiece">
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                           <span class="material-icons">place</span>
                                                        </div>
                                                    </div>
                                        </div>    
                                        <div class="input-group mb-3" >
                                         <select name="genre">
                                         <option value="genre"> MASCULIN </option>
                                         <option value="genre"> FEMININ </option>
                                         </select>
                                                 <div class="input-group-append">
                                                       <div class="input-group-text">
                                                       <span class="material-icons">wc</span>
                                                        </div>
                                                 </div>
                                                    
                                        </div>           
        
                                         <div class="input-group mb-3">
                                         <select name="sitmat">
                                         <option value="sitmat"> CELIBATAIRE</option>
                                         <option value="sitmat"> MARIE </option>
                                         </select>
                                            
                                                 <div class="input-group-append">
                                                       <div class="input-group-text">
                                                       <span class="material-icons">wc</span>
                                                        </div>
                                                 </div>
                                          </div>       
                                        <div class="input-group mb-3">
                                           
                                        <?php
                                           if ( $_SESSION['role'] == "Super-User" ) {

                                          ?>
                                            <select name="typepiece">
                                                 <option value="Administrateur" >ADMINISTRATEUR </option>
                                            </select>
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                           <span class="material-icons">web_asset</span>
                                                        </div>
                                                    </div>
                                            <?php
                                           }

                                            ?>

                                           <?php                              
                                           if ( $_SESSION['role'] == "Administrateur" ) {

                                          ?>
                                            <select name="typepiece">
                                                 <option value="Administrateur" >Agent </option>
                                            </select>
                                                  <div class="input-group-append">
                                                      <div class="input-group-text">
                                                           <span class="material-icons">web_asset</span>
                                                        </div>
                                                    </div>
                                            <?php
                                           }

                                            ?>
                                        </div>
                                         <div class="row">
          
                                             <!-- /.col -->
                                            <div class="col-4">
                                                 <button type="submit" class="btn btn-primary btn-block" name="ajouter">ENREGISTER</button>
                                            </div>
                                         <!-- /.col -->
                            </div>
                          </div>
                        </div>  
                    </div>   
                  </form>
                </div>
             
       </div>

                  <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ASKAAN BI BANQUE 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
       

    

</body>

</html>