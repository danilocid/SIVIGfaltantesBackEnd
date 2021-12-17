<?php

require_once 'Controller/DBcon.php';

Class Secciones extends DB{

    public function GetSecciones(){
        $query = $this->connect()->prepare('SELECT * FROM secciones');
        $query->execute();
        $arraysecciones = array();
        
        foreach ($query as $a) {
            

            array_push($arraysecciones, $a);
        }
        return $arraysecciones;
    }

    public function GetSeccionPorId($id){
        $query = $this->connect()->prepare('SELECT seccion FROM secciones WHERE id = :id');
        $query->execute(['id' => $id]);
        $arraysecciones = array();
        foreach ($query as $a) {
            array_push($arraysecciones, $a);
        }
        return $arraysecciones;
    }

    public function ContarFallasPorSeccion($id){
        $query = $this->connect()->prepare('SELECT COUNT(*) FROM fallas WHERE seccion = :id');
        $query->execute(['id' => $id]);
        $contador = 0;
        
        foreach ($query as $a) {
            
            $contador = $a[0];
            
        }
        return $contador;
    }
    public function ContarFallas(){
        $query = $this->connect()->prepare('SELECT COUNT(*) FROM fallas');
        $query->execute();
        $contador = 0;
        
        foreach ($query as $a) {
            
            $contador = $a[0];
            
        }
        return $contador;
    }
    public function ContarFallasFaltantesPorSeccion($id){
        $query = $this->connect()->prepare('SELECT COUNT(*) FROM fallas WHERE seccion = :id AND (estado = 1 OR estado = 2)');
        $query->execute(['id' => $id]);
        $contador = 0;
        
        foreach ($query as $a) {
            
            $contador = $a[0];
            
        }
        return $contador;
    }
    public function ContarFallasFaltantes(){
        $query = $this->connect()->prepare('SELECT COUNT(*) FROM fallas WHERE estado = 1 OR estado = 2');
        $query->execute();
        $contador = 0;
        
        foreach ($query as $a) {
            
            $contador = $a[0];
            
        }
        return $contador;
    }

    
}


?>