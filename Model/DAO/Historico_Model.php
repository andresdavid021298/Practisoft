<?php

include_once "../../Config/db._config.php";

class HistoricoModel{
    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    public function insertarAlHistorico($nombre_estudiante, $id_empresa, $funciones, $fecha_estudiante){
        $query = "INSERT INTO historico(nombre_estudiante, id_empresa, funciones, fecha_estudiante) VALUES(:nombre, :empresa, :funciones, :fecha)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre_estudiante);
        $stmt->bindParam(":empresa", $id_empresa);
        $stmt->bindParam(":funciones", $funciones);
        $stmt->bindParam(":fecha", $fecha_estudiante);
        
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }
}