<?php
include('AgenceController.php');
$AgenceController = new AgenceController();

if(isset($_POST['updateag'])){
    $nomAgence = $_POST['nomAgence'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $idAgence = $_POST['idAgence'];
    $AgenceController->updateAgence($nomAgence,$adresse,$email, $tel,$idAgence);
}
?>