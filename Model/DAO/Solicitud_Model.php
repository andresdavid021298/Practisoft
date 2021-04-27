<?php

require_once "../../Config/db._config.php";

class SolicitudModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    //Contructor que inicializa la conexion
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo que inserta una nueva solicitud
    public function insertarSolicitud($id_empresa, $numero_practicantes, $funciones)
    {
        $query = "INSERT INTO solicitud(id_empresa, numero_practicantes, funciones) VALUES(:id,:practicantes,:funciones)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":practicantes", $numero_practicantes);
        $stmt->bindParam(":funciones", $funciones);
        
        
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que actualiza una solicitud
    public function actualizarSolicitud($id_empresa, $numero_practicantes, $funciones)
    {
        $query = "UPDATE solicitud SET numero_practicantes=:practicante,funciones=:funciones WHERE id_empresa=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":practicantes", $numero_practicantes);
        $stmt->bindParam(":funciones", $funciones);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que devuelve un listado con todas las solicitudes
    public function listarSolicitudes()
    {
        $query = "SELECT id_empresa, numero_practicantes, funciones, observaciones_solicitud, estado_solicitud FROM solicitud";
        $lista_solicitud = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_solicitud[] = $result;
            }
            $stmt->closeCursor();
            return $lista_solicitud;
        }
    }

    // Metodo que devuelve un listado con todas las solicitudes
    public function listarSolicitudesPorEmpresa($id_empresa)
    {
        $query = "SELECT id_empresa, numero_practicantes, funciones, observaciones_solicitud, estado_solicitud 
                FROM solicitud 
                WHERE id_empresa = :id";
        $lista_solicitud = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_solicitud[] = $result;
            }
            $stmt->closeCursor();
            return $lista_solicitud;
        }
    }

    // Metodo para eliminar solicitud
    public function eliminarSolicitud($id_solicitud){
        $query = "DELETE FROM solicitud WHERE id_solicitud = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_solicitud);

        if(!$stmt->execute()){
            $stmt->closeCursor();
            return 0;
        }
        else{
            $stmt->closeCursor();
            return 1;
        }
    }

}