<?php

class  Agence { 

    private  string $nomAgence , $adresse , $email , $tel;

    
   public function __construct( $nomAgence = false, $adresse= false, $email=false, $tel=false ){
       $this->nomAgence = $nomAgence;
       $this->adresse = $adresse;
       $this->email = $email;
       $this->tel = $tel;
   }

   public function getNomAgence (){
       return $this->nomAgence;
   }
   public function getAdresse() {
       return $this->adresse;
   }
   public function getEmail() {
       return $this->email;
   }
   public function getTel(){
       return $this->tel;
   }

   public function setNomAgemce($nomAgemce) {
       $this->nomAgemce =$nomAgemce;

   }
   public function setadresse($adresse) {
       $this->adresse =$adresse;
   }
   public function setemail ($email) {
       $this->email =$email;
   }
   public function settel($tel) {
       $this->tel =$tel;
   }
}





























?>