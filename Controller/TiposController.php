<?php
require_once 'Controller/DBcon.php';

Class Tipos extends DB{
    public function GetTipoPorId($id){
        $query = $this->connect()->prepare('SELECT tipo_falla FROM tipos_fallas WHERE id = :id');
        $query->execute(['id' => $id]);
        $tipo = '';
        foreach ($query as $a) {
            $tipo = $a['tipo_falla'];
        }
        return $tipo;
    }

    public function GetTipos(){
        $query = $this->connect()->prepare('SELECT * FROM tipos_fallas');
        $query->execute();
        $arraytipos = array();
        
        foreach ($query as $a) {
            

            array_push($arraytipos, $a);
        }
        return $arraytipos;
    }
}

?>
