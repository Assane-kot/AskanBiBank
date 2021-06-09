<?php

require __DIR__.'/../model/User.php';
require __DIR__.'/../model/Verification.php';

  class UserController extends Verification{
    
    public function getUsers(){
        //$connect = new Verification();
		$sql = "SELECT * FROM User";
        $connexion = $this->Connection();
		$stmt = $connexion->prepare($sql);
		$stmt->execute();
        $result = $stmt->fetchAll();
		return $result;
    }
      
    /**Fonction ajouter */

    public function addUser (User $user) {
        
    /** commande d'insertion dans la base de donnees */
    $sql = "INSERT INTO `SuperUser` (`idS`, `nom`, `prenom`, `ddn`, `email`, `sexe`, `adresse`, `passwor`, `profil`) 
                VALUES (:idS, :nom , :prenom, :ddn , :email , :sexe , :adresse, :passwor , :profil) ;";
            $connexion = $this->Connection();
             /**requettes prepare */
            $stmt = $connexion->prepare($sql);
            //var_dump($user->getSexe());die();
            $stmt->bindValue (':idS',$user->getIds(),PDO::PARAM_STR);
            $stmt->bindValue (':nom',$user->getNom(),PDO::PARAM_STR);
            $stmt->bindValue (':prenom',$user->getPrenom(),PDO::PARAM_STR);
            $stmt->bindValue (':ddn',$user->getDdn(),PDO::PARAM_STR);
            $stmt->bindValue (':email',$user->getEmail(),PDO::PARAM_STR);
            $stmt->bindValue (':sexe',$user->getSexe(),PDO::PARAM_STR);
            $stmt->bindValue (':adresse',$user->getAddresse(),PDO::PARAM_STR);
            $stmt->bindValue (':passwor',$user->getPassword(),PDO::PARAM_STR);
            $stmt->bindValue (':profil',$user->getProfil(),PDO::PARAM_INT);
            $stmt->execute();
            header("location:../vue/admin/liste-admin.php");
            //$SESSION['message'] = " UTILISATEUR AJOUTER AVEC SUCCES";
            //header("Location:index.php");
        }

        //CONNEXTION A LA BASE 

    public function authentication ($login, $psw){
        $sql = "SELECT login,psw ,role  FROM User WHERE login=:login AND psw=:psw";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':login',$login ,PDO::PARAM_STR);
        $stmt->bindValue (':psw',$psw,PDO::PARAM_STR);
        $stmt->execute();
           $resultat = $stmt->fetch(PDO::FETCH_ASSOC); 
		return $resultat;
           
    }
     // requette pour avoir les details de l'utilisateur
    public function showUser ($idS) {
        $sql = "SELECT * FROM SuperUser WHERE idS=:idS" ;
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':idS',$idS ,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
      }

    // requette pour faire un update sur l'utilisateur 

    public function updateUser ($idS, $nom, $prenom, $ddn, $email, $sexe, $adresse, $password, $profil) {
        $sql = "UPDATE SuperUser SET nom =:nom , prenom =:prenom , ddn =:ddn, email=:email, sexe =:sexe, adresse =:adresse,
             passwor =:passwor, profil =:profil WHERE idS=:idS";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':idS',$idS,PDO::PARAM_STR);
        $stmt->bindValue (':nom',$nom,PDO::PARAM_STR);
        $stmt->bindValue (':prenom',$prenom,PDO::PARAM_STR);
        $stmt->bindValue (':ddn',$ddn,PDO::PARAM_STR);
        $stmt->bindValue (':email',$email,PDO::PARAM_STR);
        $stmt->bindValue (':sexe',$sexe,PDO::PARAM_STR);
        $stmt->bindValue (':adresse',$adresse,PDO::PARAM_STR);
        $stmt->bindValue (':passwor',$password,PDO::PARAM_STR);
        $stmt->bindValue (':profil',$profil,PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->execute()){
            header("location:../vue/admin/liste-admin.php");
        }
        else{
            header("location:../login.php");
        }
    }


    // supression de l'utilisateur

    public function delUser ($idS) {
        $sql = "DELETE FROM SuperUser WHERE idS =:idS";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue (':idS',$idS,PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->execute()){
            header("location:../vue/admin/liste-admin.php");
        }
        else{
            header("location:../login.php");
        }
    }
  }

  
?>