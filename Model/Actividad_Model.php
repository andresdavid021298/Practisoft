<?php

include_once "../Config/db._config.php";

class ActividadModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Método que permite insertar las actividades de la práctica
    public function insertarActividades($id_estudiante, $fecha_actividad, $descripcion_actividad, $horas_actividad)
    {
        $query = "INSERT INTO actividad(id_estudiante, fecha_actividad, descripcion_actividad, horas_actividad)
                  VALUES(:estudiante, :fecha, :descripcion, :horas)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":estudiante", $id_estudiante);
        $stmt->bindParam(":fecha", $fecha_actividad);
        $stmt->bindParam(":descripcion", $descripcion_actividad);
        $stmt->bindParam(":horas", $horas_actividad);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método que actualiza las actividades de la práctica
    public function actualizarActividad($id_actividad, $fecha_actividad, $descripcion_actividad, $horas_actividad)
    {
        $query = "UPDATE actividad SET fecha_actividad=:fecha, descripcion_actividad=:descripcion, horas_actividad=:horas
                  WHERE id_actividad=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad);
        $stmt->bindParam(":fecha", $fecha_actividad);
        $stmt->bindParam(":descripcion", $descripcion_actividad);
        $stmt->bindParam(":horas", $horas_actividad);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function eliminarActividad($id_actividad)
    {
        $query = "DELETE FROM actividad WHERE id_actividad=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para listar las activdades por estudiante
    public function listarActividadesPorEstudiante($id_estudiante)
    {
        $lista_actividades = NULL;
        $query = "SELECT e.nombre_estudiante, a.fecha_actividad, a.descripcion_actividad, a.horas_actividad, a.estado_actividad, a.observaciones_actividad
                  FROM actividad a
                  INNER JOIN estudiante e ON e.id_estudiante = a.id_estudiante
                  WHERE e.id_estudiante=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_actividades[] = $result;
            }
            $stmt->closeCursor();
            return $lista_actividades;
        }
    }

    //Método para aprobar la actividad de un estudiante
    public function cambiarActividadAprobado($id_actividad)
    {
        $query = "UPDATE actividad SET estado_actividad='Aprobada' WHERE id_actividad=:id_actividad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_actividad", $id_actividad);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para sumar la cantidad de horas del estudiante
    public function sumarHorasDelEstudiante($id_estudiante)
    {
        $query = "SELECT SUM(horas_actividad) FROM actividad WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }


    //Método para aprobar la actividad de un estudiante
    public function cambiarActividadReprobado($id_actividad, $observaciones_actividad)
    {
        $query = "UPDATE actividad SET estado_actividad='Reprobada', observaciones_actividad=:observacion WHERE id_actividad=:id_actividad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_actividad", $id_actividad);
        $stmt->bindParam(":observacion", $observaciones_actividad);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }
}

$actividad = new ActividadModel();
// $result = $actividad->insertarActividades(1, '2021-04-23', 'prueba', 4);
// $result = $actividad->actualizarActividad(11, '2021-04-24', 'prueba 2', 8);
// $result = $actividad->eliminarActividad(11);
// $result = $actividad->listarActividadesPorEstudiante(1);
// echo var_dump($result);
// $result = $actividad->cambiarActividadAprobado(13, 1);
$result = $actividad->sumarHorasDelEstudiante(1);
echo $result;
