<?php

include_once "../../Config/db._config.php";

class HistoricoModel{
    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    public function insertarAlHistoricoEstudiante($nombre_estudiante, $id_empresa, $funciones){
        $query = "INSERT INTO historico_estudiante(nombre_estudiante, id_empresa, funciones) VALUES(:nombre, :empresa, :funciones)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre_estudiante);
        $stmt->bindParam(":empresa", $id_empresa);
        $stmt->bindParam(":funciones", $funciones);        
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }
}