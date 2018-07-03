<?php

/* 
 *Objet BD
 */

class BD implements JsonSerializable{
    
    private $bd_Id;
    private $auteur;
    private $bdImg;
    private $bdResume;
    private $bdTitre;
    private $bdThemes;
    
    function __construct($bd_Id, $auteur, $bdImg, $bdResume, $bdTitre, $bdThemes = null) {
        $this->bd_Id = $bd_Id;
        $this->auteur = $auteur;
        $this->bdImg = $bdImg;
        $this->bdResume = $bdResume;
        $this->bdTitre = $bdTitre;
        $this->bdThemes = $bdThemes;
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
    
    public function jsonSerialize(){
        return [
            
                'bd_Id' => $this->bd_Id,
                'auteur' => $this->auteur,
                'bdImg' => $this->bdImg,
                'bdResume' => $this->bdResume,
                'bdTitre' => $this->bdTitre,
                'bdThemes' => $this->bdThemes
            
        ];
    }
    
}