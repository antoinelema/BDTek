<?php
class BdManager {
    
    static function getAllBd(){
        $sql =  "SELECT bd_id 'bd_Id', aut_nom 'auteur',bd_image 'bdImg',bd_resume 'bdResume', bd_titre 'titre' ".
                "FROM bandesdessinees as bd ".
                "join auteurs as aut ".
                "on aut.aut_id = bd.bd_auteur_id";
        
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
        $sqlbd =    "SELECT bd_id 'bd_Id',aut_nom 'auteur',bd_image 'bdImg',bd_resume 'bdResume', bd_titre 'titre' ".
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
    
    static function getOneBdTheme($idBd){
         $tThemes[] = 'pas de theme';       
        // -- recup themes bd --
        $sqlTheme =  "SELECT th_intitule 'theme' ".
                    'FROM bandesdessinees as bd '.
                    'join auteurs as aut '.
                    'on aut.aut_id = bd.bd_auteur_id '.
                    'join liens_bd_themes as lth '.
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
        
//        //close connection
        unset($conexion);
        
        $records = $rs->fetchAll(); // on lit tout ;
        foreach ($records as $ligne) {
//            var_dump($ligne);
            extract($ligne);
            $tThemes[] = $theme;
        }
        
        var_dump($tThemes);
    }
    
    static function getAllOBd(){
        $tbd = array();

        try {
            $resultat = BdManager::getAllBd();
            $record = $resultat -> fetchall();

            for ($record as $ligne) {
                extract($ligne);
                $bd = new BD($bd_Id, $auteur, $bdImg, $bdResume, $titre);
                $bd->setBdThemes(BdManager::getOneBdTheme($bd_Id));
                $tbd[]=$bd;
            }

        } catch (Exception $ex) {

            echo($ex->getMessage());
        }
        return $tbd;
    }
    
    
        
}