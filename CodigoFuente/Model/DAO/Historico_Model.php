<?php

include_once "../../Config/db._config.php";

class HistoricoModel
{
    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    public function insertarAlHistoricoEstudiante($nombre_estudiante, $id_empresa, $funciones)
    {
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

    // Método que retorna la cantidad de solicitudes de capacitación según una fecha determinada
    public function cantidadAreasCapacitacionPorEmpresaYFecha($fecha_inicio, $fecha_fin)
    {
        $cantidad_solicitudes = NULL;
        $query = "SELECT COUNT(h.funciones) AS funciones FROM historico_solicitud h
        WHERE h.funciones LIKE '%Capacitacion%' AND h.fecha >= :fecha_inicio AND h.fecha <= :fecha_fin";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin", $fecha_fin);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cantidad_solicitudes[] = $cantidad;
            }
            $stmt->closeCursor();
            return $cantidad_solicitudes;
        }
    }

    // Método que retorna la cantidad de solicitudes de Desarrollo de Software según una fecha determinada
    public function cantidadAreasDesarrolloDeSoftwarePorEmpresaYFecha($fecha_inicio, $fecha_fin)
    {
        $cantidad_solicitudes = NULL;
        $query = "SELECT COUNT(h.funciones) AS funciones FROM historico_solicitud h
        WHERE h.funciones LIKE '%Desarrollo%' AND h.fecha >= :fecha_inicio AND h.fecha <= :fecha_fin";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin", $fecha_fin);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cantidad_solicitudes[] = $cantidad;
            }
            $stmt->closeCursor();
            return $cantidad_solicitudes;
        }
    }

    // Método que retorna la cantidad de solicitudes de Mantenimiento según una fecha determinada
    public function cantidadAreasMantenimientoPorEmpresaYFecha($fecha_inicio, $fecha_fin)
    {
        $cantidad_solicitudes = NULL;
        $query = "SELECT COUNT(h.funciones) AS funciones FROM historico_solicitud h
        WHERE h.funciones LIKE '%Mantenimiento%' AND h.fecha >= :fecha_inicio AND h.fecha <= :fecha_fin";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin", $fecha_fin);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cantidad_solicitudes[] = $cantidad;
            }
            $stmt->closeCursor();
            return $cantidad_solicitudes;
        }
    }

    // Método que retorna la cantidad de solicitudes de Servidores según una fecha determinada
    public function cantidadAreasServidoresPorEmpresaYFecha($fecha_inicio, $fecha_fin)
    {
        $cantidad_solicitudes = NULL;
        $query = "SELECT COUNT(h.funciones) AS funciones FROM historico_solicitud h
        WHERE h.funciones LIKE '%Servidores%' AND h.fecha >= :fecha_inicio AND h.fecha <= :fecha_fin";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin", $fecha_fin);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cantidad_solicitudes[] = $cantidad;
            }
            $stmt->closeCursor();
            return $cantidad_solicitudes;
        }
    }

    // Método que retorna la cantidad de solicitudes de Redes según una fecha determinada
    public function cantidadAreasRedesPorEmpresaYFecha($fecha_inicio, $fecha_fin)
    {
        $cantidad_solicitudes = NULL;
        $query = "SELECT COUNT(h.funciones) AS funciones FROM historico_solicitud h
        WHERE h.funciones LIKE '%Redes%' AND h.fecha >= :fecha_inicio AND h.fecha <= :fecha_fin";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_fin", $fecha_fin);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cantidad_solicitudes[] = $cantidad;
            }
            $stmt->closeCursor();
            return $cantidad_solicitudes;
        }
    }
}
