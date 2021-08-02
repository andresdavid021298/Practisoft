<?php

require_once "../../Config/db._config.php";

class Encuesta_Areas_Model
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo para insertar una nueva encuesta para un estudiante
    public function insertarEncuesta($id_estudiante, $area_capacitacion, $area_desarrollo, $area_mantenimiento, $area_redes, $area_servidores,$otro)
    {
        $query = "INSERT INTO encuesta_areas(id_estudiante,area_desarrollo,area_capacitacion,area_mantenimiento,area_servidores,area_redes,otro)
                  VALUES(:id,:desarrollo,:capacitacion,:mantenimiento,:servidores,:redes,:otro)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        $stmt->bindParam(":desarrollo", $area_desarrollo);
        $stmt->bindParam(":capacitacion", $area_capacitacion);
        $stmt->bindParam(":mantenimiento", $area_mantenimiento);
        $stmt->bindParam(":redes", $area_redes);
        $stmt->bindParam(":servidores", $area_servidores);
        $stmt->bindParam(":otro", $otro);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function buscarEncuesta($id_estudiante)
    {
        $query = "SELECT COUNT(*) AS 'cantidad_registro' FROM encuesta_areas WHERE id_estudiante=:id";
        $cantidad = 0;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $cantidad = $result['cantidad_registro'];
            $stmt->closeCursor();
            return $cantidad;
        }
    }
    public function detallesEncuestaPorEstudiante($id_estudiante)
    {
        $query = "SELECT * FROM encuesta_areas WHERE id_estudiante=:id";
        $detalles_encuesta = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $detalles_encuesta = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $detalles_encuesta;
        }
    }
}
