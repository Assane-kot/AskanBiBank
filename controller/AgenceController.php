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


     // requette pour avoir les details de AGENCE
     public function showAgence ($idAgence) {
        $sql = "SELECT * FROM Agence WHERE idAgence=:idAgence" ;
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':idAgence',$idAgence ,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      }
    
     // update Agent

      public function updateAgence ($nomAgence,$adresse ,$email , $tel, $idAgence) {
        $sql = "UPDATE Agence SET nomAgence =:nomAgence , adresse =:adresse , email =:email, tel =:tel WHERE idAgence=:idAgence";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':nomAgence',$nomAgence,PDO::PARAM_STR);
        $stmt->bindValue (':adresse',$adresse,PDO::PARAM_STR);
        $stmt->bindValue (':email',$email,PDO::PARAM_STR);
        $stmt->bindValue (':tel',$tel,PDO::PARAM_STR);
        $stmt->bindValue (':idAgence',$idAgence ,PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->execute()){
            header("location:../vue/liste-agence.php");
        }
        else{
            header("location:../vue/ajouter-agence.php");
        }
    }

     // supression de l'utilisateur

    public function delAgence ($idAgence) {
        $sql = "DELETE FROM Agence WHERE idAgence =:idAgence";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':idAgence',$idAgence,PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->execute()){
            header("location:../vue/liste-agence.php");
        }
        else{
            header("location:../vue/ajouter-agence.php");
        }
    }




        
}
?>