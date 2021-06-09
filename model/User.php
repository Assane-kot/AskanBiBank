<?php
 class User {

     private string $idUser, $login, $psw ;
     //private Date ;

          /** Creation du constructeur  */
         public function __construct($idUser = false ,$login = false, $psw = false) {
             $this->idUser = $idUser;
             $this->login = $login;
             $this->psw = $psw;
         }

         /**fonction de recuperation avec les getteur  */

         public function getIdUser(){
            return $this->idUser;
         }

         public function getLogin(){
             return $this->login;
         }

         public function getPsw() {
             return $this->psw;
         }

         /** Setteur definir les donnees */

         public function setIdUser($idUser){
            $this->idUser = $idUser;
          }
          public function setLogin($Login){
            $this->login = $Login;
          }
          public function setPsw($psw){
            $this->psw = $psw;
          }
          
 }       

?>