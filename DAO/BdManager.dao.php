<?php


class BdManager {
    /**
     * va chercher toute les infos sur toutes les bd (sauf les themes)
     * @return le vecteur de bd
     */
    static function getAllBd(){
        $sql =  'SELECT bd_id \'bd_Id\', aut_nom \'auteur\',bd_image \'bdImg\',bd_resume \'bdResume\', bd_titre \'titre\' '.
                'FROM bandesdessinees as bd '.
                'join auteurs as aut '.
                'on aut.aut_id = bd.bd_auteur_id';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sql);
        
        // execute statement
        $rs->execute(array());
        
        return $rs;
    }
    
    
    static function getOneBd($idBd){
         
        //conexion
        $conexion = ConnectionManager::conexion();
        
        // -- recup bd --
        $sqlbd =    'SELECT bd_id \'bd_Id\',aut_nom \'auteur\',bd_image \'bdImg\',bd_resume \'bdResume\', bd_titre \'titre\' '.
                    'FROM bandesdessinees as bd '.
                    'join auteurs as aut '.
                    'on aut.aut_id = bd.bd_auteur_id '.
                    'where bd_Id = ?';
        
        //prepare statment
        $rs = $conexion->prepare($sqlbd);
        
        // execute statement
        $rs->execute(array($idBd));
        
        //close connection
        unset($conexion);
        
    }
    
    /**
     * vas chercher sur la bdd le(s) theme(s) d'une bd
     * @param type $idBd
     * @return un array des themes d'une bd
     */
    static function getOneBdTheme($idBd){
         $tThemes = array();       
        // -- recup themes bd --
        $sqlTheme = 'SELECT th_intitule \'theme\' '.
                    'FROM bandesdessinees as bd '.
                    'join auteurs as aut '.
                    'on aut.aut_id = bd.bd_auteur_id '.
                    'join liens'.
                    '_bd_themes as lth '.
                    'on lth.lien_bd_id = bd.bd_id '.
                    'join themes th '.
                    'on th.th_id = lth.lien_themes_id '.
                    'WHERE bd_id = ?';
        
        //conexion
        $conexion = ConnectionManager::conexion();
        
        //prepare statment
        $rs = $conexion->prepare($sqlTheme);
        
        // execute statement
        $rs->execute(array($idBd));
        
//        close connection
        unset($conexion);
        
        $records = $rs->fetchAll(); // on lit tout ;
        foreach ($records as $ligne) {
//            var_dump($ligne);
            extract($ligne);
            $tThemes[] = $theme;
        }
        
//var_dump($tThemes);
        return $tThemes;
    }
    
    /**
     * utilise les fonctions getAllBd et getOneBdTheme et transforme les bd en Objet bd
     * @return un array d'objet BD
     */
    static function getAllOBd(){
        $tbd = array();

        try {
            $resultat = BdManager::getAllBd();
            $record = $resultat -> fetchall();
//var_dump($record);
           
            
            foreach($record as $ligne) {
                extract($ligne);
                $tTheme = (BdManager::getOneBdTheme($bd_Id));
                
                $bd = new BD($bd_Id, $auteur, $bdImg, $bdResume, $titre, $tTheme);
                
                $tbd[]=$bd;
            }

        } catch (Exception $ex) {

            echo($ex->getMessage());
        }
//var_dump($tbd);
        return $tbd;
    }
    
    
        
}