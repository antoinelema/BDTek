<?php

/* 
 *
 */

class CommentairesManager{
    static function getAllComUnpublished(){
        $sql = 'SELECT * FROM commentaires WHERE publie is null  or publie <> \'v\'';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sql);
        
        // execute statement
        $rs->execute(array());
        
        return $rs;
    }
    
    static function getAllComFromABd($bdId){
        $sql =  'SELECT com_id, com_bd_id,com_date,com_auteur,com_texte,publie '.
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
    
    /**
     * insert un commentaire dans la base, ne le publie pas
     * @param objet commentaire $oCom
     */
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
    
    /**
     * updatre la bdd pour la publication du commentaire
     * @param objet commentaire $oCom
     */
    static function updateCom($oCom){
        $sql = 'UPDATE commentaires SET com_texte = ?, publie=\'v\' WHERE com_id = ?';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sql);
        
        // execute statement
        $rs->execute(array($oCom->getCom_texte(),$oCom->getCom_id()));
    }
    
    /**
     * delete le commentaire de la bdd
     * @param objet commentaire $oCom
     */
    static function deleteCom($oCom){
        $sql = 'DELETE FROM commentaires WHERE com_id = ?';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sql);
        
        // execute statement
        $rs->execute(array($oCom->getCom_id()));
    }

    
    /**
     * retourne un tableau d'objet commentaire en fonction d'un id de bd
     * @param string $bdId id de la bd
     * @return array d'objet Commentaire
     */
    static function getAllOComFromABd($bdId){
        $tComs = array();

        try {
            $resultat = CommentairesManager::getAllComFromABd($bdId);
            $record = $resultat -> fetchall();
//var_dump($record);
           
            
            foreach($record as $ligne) {
                extract($ligne);
//var_dump($ligne);
                
                $com = new Commentaire($com_bd_id, $com_auteur, $com_texte, $com_id, $com_date,$publie);
                
                $tComs[]=$com;
            }

        } catch (Exception $ex) {

            echo( 'Un probleme est survenue !'.$ex->getMessage());
        }
//var_dump($tComs);
        return $tComs;
    
    }

    /**
     * 
     * @return array de Commentaire
     */
    static function getAllOComUnpublished(){
        $tComs = array();

        try {
            $resultat = CommentairesManager::getAllComUnpublished();
            $record = $resultat -> fetchall();
//var_dump($record);
           
            
            foreach($record as $ligne) {
                extract($ligne);
//var_dump($ligne);
                
                $com = new Commentaire($com_bd_id, $com_auteur, $com_texte, $com_id, $com_date,$publie);
                
                $tComs[]=$com;
            }

        } catch (Exception $ex) {

            echo( 'Un probleme est survenue !'.$ex->getMessage());
        }
//var_dump($tComs);
        return $tComs;
    
    }
}