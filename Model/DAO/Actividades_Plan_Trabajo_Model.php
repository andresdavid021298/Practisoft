<?php

require_once "../../Config/db._config.php";

class ActividadPlanTabajoModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo que permite insertar una actividad correspondiente al plan de trabajo de un estudiante
    public function insertarActividadPlanTrabajo($id_estudiante, $descripcion_actividad, $numero_horas)
    {
        $query = "INSERT INTO actividades_plan_trabajo(id_estudiante,descripcion_actividad_plan_trabajo,numero_horas_actividad_plan_trabajo) VALUES(:id_estudiante,:descripcion,:num_horas)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":descripcion", $descripcion_actividad);
        $stmt->bindParam(":num_horas", $numero_horas);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Meetodo que permite borrar todas las actividades de un estudiante
    public function eliminarTodasActividadesPlanTrabajoPorEstudiante($id_estudiante)
    {
        $query = "DELETE FROM actividades_plan_trabajo WHERE id_estudiante=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que permite listar todas las actividades del plan de trabajo de un estudiante
    public function listarActividadesPlanTrabajoPorEstudiante($id_estudiante)
    {
        $query = "SELECT id_actividad_plan_trabajo, descripcion_actividad_plan_trabajo, numero_horas_actividad_plan_trabajo,estado,observacion FROM actividades_plan_trabajo WHERE id_estudiante=:id";
        $lista_actividades_plan_trabajo = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_actividades_plan_trabajo[] = $result;
            }
            $stmt->closeCursor();
            return $lista_actividades_plan_trabajo;
        }
    }

    public function listarActividadesPlanTrabajoPorEstudianteAprobadas($id_estudiante)
    {
        $query = "SELECT a.id_actividad_plan_trabajo, a.descripcion_actividad_plan_trabajo, a.numero_horas_actividad_plan_trabajo, a.estado, e.nombre_estudiante 
                  FROM actividades_plan_trabajo a RIGHT JOIN estudiante e ON a.id_estudiante = e.id_estudiante 
                  WHERE a.id_estudiante=:id AND a.estado='Aprobada'";
        $lista_actividades_plan_trabajo = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_actividades_plan_trabajo[] = $result;
            }
            $stmt->closeCursor();
            return $lista_actividades_plan_trabajo;
        }
    }

    // Metodo que permite detallar una actividad de un plan de trabajo
    public function buscarActividadPlanTrabajo($id_actividad_plan_trabajo)
    {
        $query = "SELECT * FROM actividades_plan_trabajo WHERE id_actividad_plan_trabajo=:id";
        $datos_actividad = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_actividad_plan_trabajo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $datos_actividad = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $datos_actividad;
        }
    }


    //Método para aprobar plan de trabajo de un estudiante
    public function planTrabajoAprobado($id_estudiante)
    {
        $query = "UPDATE actividades_plan_trabajo SET estado='Aprobada' WHERE id_estudiante=:id_estudiante";
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

    //Método para reprobar el plan de trabajo de un estudiante
    public function planTrabajoReprobado($id_estudiante, $observacion)
    {
        $query = "UPDATE actividades_plan_trabajo SET estado='Rechazada', observacion=:observacion WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":observacion", $observacion);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Contar las actividades aprobadas del plan de trabajo para conocer su estado
    public function contarPlanTrabajoAprobado($id_estudiante)
    {
        $query = "SELECT COUNT(*) AS cantidad FROM actividades_plan_trabajo WHERE id_estudiante=:id_estudiante AND estado='Aprobada'";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $cantidad_aprobadas = null;
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (!is_null($result)) {
                $cantidad_aprobadas = $result['cantidad'];
            }
            return $cantidad_aprobadas;
        }
    }

    //Contar las actividades aprobadas del plan de trabajo para conocer su estado
    public function contarPlanTrabajoRechazado($id_estudiante)
    {
        $query = "SELECT COUNT(*) AS cantidad FROM actividades_plan_trabajo WHERE id_estudiante=:id_estudiante AND estado='Rechazada'";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $cantidad_rechazado = null;
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (!is_null($result)) {
                $cantidad_rechazado = $result['cantidad'];
            }
            return $cantidad_rechazado;
        }
    }

    public function contarPlanTrabajoEspera($id_estudiante)
    {
        $query = "SELECT COUNT(*) AS cantidad FROM actividades_plan_trabajo WHERE id_estudiante=:id_estudiante AND estado='En Espera'";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $cantidad_espera = null;
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (!is_null($result)) {
                $cantidad_espera = $result['cantidad'];
            }
            return $cantidad_espera;
        }
    }

    //Método para generar el encabezado del informe de actividades
    public function generarEncabezadoInformeDeActividades($id_estudiante)
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
                  WHERE e.id_estudiante=:id ORDER BY estado_actividad";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
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
}
