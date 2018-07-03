<?php

/* 
 * objet commentair
 */

class Commentaire{
    
    private $com_id;
    private $com_bd_id;
    private $com_date;
    private $com_auteur;
    private $com_texte;
    
    function __construct($com_bd_id, $com_auteur, $com_texte, $com_id = null, $com_date = null) {
        $this->com_id = $com_id;
        $this->com_bd_id = $com_bd_id;
        $this->com_date = $com_date;
        $this->com_auteur = $com_auteur;
        $this->com_texte = $com_texte;
    }
    
    function getCom_id() {
        return $this->com_id;
    }

    function getCom_bd_id() {
        return $this->com_bd_id;
    }

    function getCom_date() {
        return $this->com_date;
    }

    function getCom_auteur() {
        return $this->com_auteur;
    }

    function getCom_texte() {
        return $this->com_texte;
    }

    


}