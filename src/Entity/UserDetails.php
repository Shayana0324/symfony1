<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserDetailsRepository")
 */

class UserDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $email;
    
     /**
     * @ORM\Column(type="text")
     */
    private $pw; 

    public function getId(){
        return $this->id;
    }
    
    public function getEmail(){
    
        return $this->email;
    }
    
    public function setEmail($email){
       return $this->email=$email; 
   }

   public function getPw(){

    return $this->pw;
   }

   public function setPw($pw){
   return $this->pw=$pw; 
   }

   
}
?>