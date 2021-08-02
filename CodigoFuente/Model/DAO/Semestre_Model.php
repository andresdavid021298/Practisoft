<?php

require_once "../../Config/db._config.php";

class SemestreModel{
    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    //Contructor que inicializa la conexion
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Metodo para insertar semestre
    public function insertarSemestre($nombre){
        $query = "INSERT INTO semestre(nombre_semestre) VALUES(:nombre_semestre)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre_semestre", $nombre);
        
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function listarSemestre(){
        $query = "SELECT * FROM semestre";
        $stmt = $this->conexion->prepare($query);
        $result = NULL;
        if(!$stmt->execute()){
            $stmt->closeCursor();
            return 0;
        } else{
            if($stmt->rowCount() > 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $result;    
        }
    }

}