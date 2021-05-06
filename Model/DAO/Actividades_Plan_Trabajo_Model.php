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

    // Metodo que permite listar las actividades aprobadas del plan de trabajo de un estudiante
    public function listarActividadesPlanTrabajoPorEstudianteAprobadas($id_estudiante)
    {
        $query = "SELECT id_actividad_plan_trabajo, descripcion_actividad_plan_trabajo, numero_horas_actividad_plan_trabajo,estado FROM actividades_plan_trabajo WHERE id_estudiante=:id AND estado='Aprobada'";
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
}
