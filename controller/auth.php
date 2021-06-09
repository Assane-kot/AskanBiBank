<?php 
include('UserController.php');

$UserController = new UserController();

if(isset($_POST['cnx'])){
	$login = $_POST['login'];
	$psw = $_POST['psw'];
    $result = $UserController->authentication($login,$psw);
    if(!empty($result)){
        session_start();
        $_SESSION['role'] = $result['role'];
        header("location:../accueil.php");
	}
    else{
		header("location:../index.php");
	}
     

}


 ?>