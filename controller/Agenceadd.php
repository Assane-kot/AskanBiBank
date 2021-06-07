<?php 
//injection de dependance
include('AgenceController.php');
/*
instance de la classe administrateur 
et creation de l'objet qui s'appele userController de la classe UseControle
*/

$agenceController = new AgenceController();
if (isset($_POST['ajouter'])) {
    $nomAgence = $_POST['nomAgence'];
	$adresse = $_POST['adresse'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
    //$strtodate = strtotime($ddn);
    //$strtodate = DateTime::createFromFormat('Y-m-d',$ddn)->format('Y-m-d');
	


	//instance de classe User
	$agence = new Agence($nomAgence,$adresse,$email,$tel);

	//appele a la fonction addUser de la useControle qui permet d'inserer des users a la base de donn"e
	$agenceController->addAgence($agence);
}
