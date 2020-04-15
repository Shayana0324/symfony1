<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailsRepository")
 */
class Details
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
    private $movie;

    /**
     * @ORM\Column(type="text")
     */


     //getter and setters

     public function getId(){
         return $this->id;
     }

     public function getMovie(){
         return $this->movie;
     }
     
     public function setMovie($movie){
        return $this->movie=$movie; 
    }

   }

