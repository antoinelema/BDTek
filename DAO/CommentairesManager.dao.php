<?php

/* 
 *
 */

class CommentairesManager{
    static function getAllCom(){
    
    }
    
    static function getAllComFromABd($bdId){
        $sql =  'SELECT com_id, com_bd_id,com_date,com_auteur,com_texte '.
                'FROM commentaires AS com '.
                'JOIN bandesdessinees AS bd '.
                'ON com.com_bd_id = bd.bd_id '.
                'WHERE bd.bd_id = ?';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sql);
        
        // execute statement
        $rs->execute(array($bdId));
        
        return $rs;
    }
    
   static function insertCom($oCom){
       $bdId = $oCom->getCom_bd_id();
       $pseudo = $oCom->getCom_auteur();
       $text = $oCom->getCom_texte();
       
       
        $sql =  'INSERT INTO commentaires (com_id, com_bd_id, com_date, com_auteur, com_texte) '.
                'VALUES (NULL, ?, CURRENT_TIMESTAMP, ?, ?)';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sql);
        
        // execute statement
        $rs->execute(array($bdId,$pseudo,$text));
    }
    
    static function getAllOComFromABd($bdId){
        $tComs = array();

        try {
            $resultat = CommentairesManager::getAllComFromABd($bdId);
            $record = $resultat -> fetchall();
//var_dump($record);
           
            
            foreach($record as $ligne) {
                extract($ligne);
//var_dump($ligne);
                
                $com = new Commentaire($com_bd_id, $com_auteur, $com_texte, $com_id, $com_date);
                
                $tComs[]=$com;
            }

        } catch (Exception $ex) {

            echo( 'Un probleme est survenue !'.$ex->getMessage());
        }
//var_dump($tComs);
        return $tComs;
    
    }
}