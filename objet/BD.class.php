<?php

/* 
 *Objet BD
 */

class BD {
    
    private $bd_Id;
    private $auteur;
    private $bdImg;
    private $bdResume;
    private $bdTitre;
    private $bdThemes;
    
    function __construct($bd_Id, $auteur, $bdImg, $bdResume, $bdTitre) {
        $this->bd_Id = $bd_Id;
        $this->auteur = $auteur;
        $this->bdImg = $bdImg;
        $this->bdResume = $bdResume;
        $this->bdTitre = $bdTitre;        
    }
    
    function getBd_Id() {
        return $this->bd_Id;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getBdImg() {
        return $this->bdImg;
    }

    function getBdResume() {
        return $this->bdResume;
    }

    function getBdTitre() {
        return $this->bdTitre;
    }
    
    function getBdThemes() {
        return $this->bdThemes;
    }
    
    function setBdThemes($bdThemes) {
        $this->bdThemes = $bdThemes;
    }


}