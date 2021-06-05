<?php

require_once "../../Config/db._config.php";

class ActividadModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Método que permite insertar las actividades de la práctica
    public function insertarActividades($id_actividad_plan_estudiante, $fecha_actividad, $descripcion_actividad, $horas_actividad)
    {
        $query = "INSERT INTO actividad(id_actividad_plan_trabajo, fecha_actividad, descripcion_actividad, horas_actividad)
                  VALUES(:actividad_plan_trabajo, :fecha, :descripcion, :horas)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":actividad_plan_trabajo", $id_actividad_plan_estudiante);
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
        $query = "UPDATE actividad SET fecha_actividad=:fecha, descripcion_actividad=:descripcion, horas_actividad=:horas, estado_actividad='En Espera'
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
    public function listarActividadesPorActividadPlanTrabajo($id_actividad_plan_trabajo)
    {
        $lista_actividades = NULL;
        $query = "SELECT id_actividad, id_actividad_plan_trabajo,fecha_actividad, descripcion_actividad, horas_actividad, estado_actividad, observaciones_actividad
                  FROM actividad
                  WHERE id_actividad_plan_trabajo=:id ORDER BY estado_actividad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad_plan_trabajo);
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
        $query = "UPDATE actividad SET estado_actividad='Aprobada', observaciones_actividad=NULL WHERE id_actividad=:id_actividad";
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

    //Método para sumar la cantidad de horas del estudiante de las actividades aprobadas
    public function sumarHorasDelEstudiante($id_estudiante)
    {
        $query = "SELECT SUM(a.horas_actividad) AS horas_estudiante 
                  FROM actividad AS a 
                  JOIN actividades_plan_trabajo AS a_p ON a.id_actividad_plan_trabajo=a_p.id_actividad_plan_trabajo 
                  WHERE a_p.id_estudiante=:id_estudiante AND a.estado_actividad='Aprobada'";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $horas = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if ($horas['horas_estudiante'] === NULL) {
                return 0;
            } else {
                return $horas['horas_estudiante'];
            }
        }
    }

    public function sumarHorasPorActividadPlanTrabajo($id_actividad_plan_estudiante)
    {
        $query = "SELECT SUM(horas_actividad) AS horas_estudiante FROM actividad WHERE id_actividad_plan_trabajo=:id AND estado_actividad='Aprobada'";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad_plan_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $horas = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if ($horas['horas_estudiante'] === NULL) {
                return 0;
            } else {
                return $horas['horas_estudiante'];
            }
        }
    }

    //Método para reprobar la actividad de un estudiante
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

    //Método para generar los datos del informe de subactividades
    public function generarInformeDeSubactividades($id_actividad_plan_trabajo)
    {
        $lista_actividades = NULL;
        $query = "SELECT a.id_actividad, a.fecha_actividad, a.descripcion_actividad,
                         a.horas_actividad, a.estado_actividad, a.observaciones_actividad, apt.descripcion_actividad_plan_trabajo
                  FROM actividad a
                  RIGHT JOIN actividades_plan_trabajo apt ON a.id_actividad_plan_trabajo = apt.id_actividad_plan_trabajo
                  WHERE a.id_actividad_plan_trabajo=:id ORDER BY estado_actividad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad_plan_trabajo);
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

    //Método para generar el encabezado del informe de subactividades
    public function generarEncabezadoInformeDeSubactividades($id_actividad_plan_trabajo)
    {
        $lista_actividades = NULL;
        $query = "SELECT a.id_actividad, a.fecha_actividad, a.descripcion_actividad, a.horas_actividad, a.estado_actividad,
                         a.observaciones_actividad, apt.descripcion_actividad_plan_trabajo, e.nombre_estudiante, e.codigo_estudiante,
                         em.nombre_empresa, t.nombre_tutor
                  FROM actividad a
                  RIGHT JOIN actividades_plan_trabajo apt ON a.id_actividad_plan_trabajo = apt.id_actividad_plan_trabajo
                  RIGHT JOIN estudiante e ON apt.id_estudiante = e.id_estudiante
                  LEFT JOIN empresa em ON e.id_empresa = em.id_empresa
                  LEFT JOIN tutor t ON e.id_tutor = t.id_tutor
                  WHERE a.id_actividad_plan_trabajo=:id ORDER BY estado_actividad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad_plan_trabajo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $lista_actividades = $result;
            $stmt->closeCursor();
            return $lista_actividades;
        }
    }

    //Método que permite contar la cantidad de subatividades por actividad
    public function cantidadDeSubactividadesPorActividad($id_actividad_plan_trabajo)
    {
        $cantidad_subactividades = 0;
        $query = "SELECT COUNT(*) AS cantidad FROM actividad WHERE id_actividad_plan_trabajo=:id_actividad_plan_trabajo";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_actividad_plan_trabajo", $id_actividad_plan_trabajo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (!is_null($result)) {
                $cantidad_subactividades = $result['cantidad'];
            }
            return $cantidad_subactividades;
        }
    }

    //Método que permite contar la cantidad de subatividades por actividad que se encuentren en espera
    public function cantidadDeSubactividadesPorActividadEnEspera($id_actividad_plan_trabajo)
    {
        $cantidad_subactividades = 0;
        $query = "SELECT COUNT(*) AS cantidad FROM actividad WHERE id_actividad_plan_trabajo=:id_actividad_plan_trabajo AND estado_actividad = 'En Espera'";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_actividad_plan_trabajo", $id_actividad_plan_trabajo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (!is_null($result)) {
                $cantidad_subactividades = $result['cantidad'];
            }
            return $cantidad_subactividades;
        }
    }
}