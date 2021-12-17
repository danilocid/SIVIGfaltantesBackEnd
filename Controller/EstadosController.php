<?php
require_once 'Controller/DBcon.php';

Class Estados extends DB{
    public function GetEstadoPorId($id){
        $query = $this->connect()->prepare('SELECT * FROM estados WHERE id = :id');
        $query->execute(['id' => $id]);
        $arrayestados = array();
        foreach ($query as $a) {
            array_push($arrayestados, $a);
        }
        return $arrayestados;
    }

    public function GetEstados(){
        $query = $this->connect()->prepare('SELECT * FROM estados');
        $query->execute();
        $arrayestados = array();
        
        foreach ($query as $a) {
            

            array_push($arrayestados, $a);
        }
        return $arrayestados;
    }
}

?>
