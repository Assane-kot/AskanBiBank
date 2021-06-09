<?php
/**include('UserController.php');
if (isset($_GET['idS'])){
    $id = $_GET['idS'];
    var_dump($id);
    die();
    
}
echo $id;

$UserController = new UserController();


if(isset($_GET['idS'])){
    $UserController->delUser($_GET['idS']);
    
}*/
session_start();
//echo $_SESSION['id'];

include('AgenceController.php'); 
$id = $_SESSION['id'];

  
$AgenceController = new AgenceController();

if(isset($_SESSION['id'])){
    $AgenceController->delAgence($id);

}
?>