<?php
require_once 'Controller/DBcon.php';

Class Fallas extends DB{
    public function GetFallas(){
        $query = $this->connect()->prepare('SELECT * FROM fallas');
        $query->execute();
        $arraysecciones = array();
        
        foreach ($query as $a) {
            

            array_push($arraysecciones, $a);
        }
        return $arraysecciones;
    }
    public function GetFallasPendientes(){
        $query = $this->connect()->prepare('SELECT * FROM fallas WHERE estado = 1 or estado = 2');
        $query->execute();
        $arraysecciones = array();
        
        foreach ($query as $a) {
            

            array_push($arraysecciones, $a);
        }
        return $arraysecciones;
    }
    public function GetFallaPorId($id){
        $query = $this->connect()->prepare('SELECT * FROM fallas WHERE id = :id');
        $query->execute(['id' => $id]);
        $arraysecciones = array();
        
        foreach ($query as $a) {
            

            array_push($arraysecciones, $a);
        }
        return $arraysecciones;
    }

    public function EditarFalla($id, $estado, $seccion, $tipo, $observaciones){
        if ($estado == 3) {
            try {
            
                $query = $this->connect()->prepare('UPDATE fallas SET fecha_finalizacion = NOW(), estado = 3 WHERE id = :id');
                $query->execute(['id' => $id]);
                echo '<script type="text/javascript">
                   window.location="fallaspendientes";
                  </script>';
            } catch (PDOException $e) {
                print_r('Error conenection: ' . $e->getMessage());
               print_r($query);
               
            }
        } else {
            try {
                $query = $this->connect()->prepare('UPDATE fallas SET estado = :estado, 
                seccion = :seccion, tipo = :tipo, observaciones = :observaciones WHERE id = :id');
                $query->execute([
                    'id' => $id,
                    'estado' => $estado,
                    'seccion' => $seccion,
                    'tipo' => $tipo,
                    'observaciones' => $observaciones
                ]);
                echo '<script type="text/javascript">
                 window.location="fallaspendientes";
                  </script>';
            } catch (PDOException $e) {
                print_r('Error conenection: ' . $e->getMessage());
               print_r($query);
              
            }
        }
            
    }

    public function AgregarFalla($tipo, $seccion, $observaciones){
        try {
            $query = $this->connect()->prepare('INSERT INTO fallas VALUES(NULL, 1, :tipo, :seccion, :observaciones, NOW(), NULL)');
            $query->execute([
                 'seccion' => $seccion,
                'tipo' => $tipo,
                'observaciones' => $observaciones
            ]);
            echo '<script type="text/javascript">
               window.location="fallaspendientes";
              </script>';
        } catch (PDOException $e) {
            print_r('Error conenection: ' . $e->getMessage());
           print_r($query);
          
        }
    }

    public function GetFallasPendientesPorSeccion($id){
        $query = $this->connect()->prepare('SELECT * FROM fallas WHERE seccion = :id AND (estado = 1 OR estado = 2)');
        $query->execute(['id' => $id]);
        $fallas = array();
        
        foreach ($query as $a) {
            
            array_push($fallas, $a);
            
        }
        return $fallas;

    }

}

?>