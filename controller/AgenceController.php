<?php
require __DIR__.'/../model/Agence.php';
require __DIR__.'/../model/Verification.php';
    
class AgenceController extends Verification{
    
    public function getAgence(){
        //$connect = new Verification();
		$sql = "SELECT * FROM Agence";
        $connexion = $this->Connection();
		$stmt = $connexion->prepare($sql);
		$stmt->execute();
        $result = $stmt->fetchAll();
		return $result;
    }



   public function addAgence (Agence $agence) {
        
       /** commande d'insertion dans la base de donnees */
      $sql = "INSERT INTO `Agence` ( `nomAgence`, `adresse`, `email` ,`tel`) 
                VALUES (:nomAgence, :adresse , :email, :tel );";
            $connexion = $this->Connection();
             /**requettes prepare */
            $stmt = $connexion->prepare($sql);
            //var_dump($user->getSexe());die();
            $stmt->bindValue (':nomAgence',$agence->getNomAgence(),PDO::PARAM_STR);
            $stmt->bindValue (':adresse',$agence->getAdresse(),PDO::PARAM_STR);
            $stmt->bindValue (':email',$agence->getEmail(),PDO::PARAM_STR);
            $stmt->bindValue (':tel',$agence->getTel(),PDO::PARAM_STR);
            $stmt->execute();
            header("location:../vue/liste-agence.php");
            //$SESSION['message'] = " UTILISATEUR AJOUTER AVEC SUCCES";
            //header("Location:index.php");
    }





        
}
?>