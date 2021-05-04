<?php

require_once "../../Config/db._config.php";

class EstudianteModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo para insertar un nuevo estudiante en la base de datos(Solo conociendo el correo electronico)
    public function insertarEstudiante($correo)
    {
        $query = "INSERT INTO estudiante(correo_estudiante) VALUES(:correo)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":correo", $correo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que permite actualizar la informacion del estudiante
    public function actualizarEstudiante($id_estudiante, $nombre_estudiante, $codigo_estudiante, $celular_estudiante)
    {
        $query = "UPDATE estudiante SET nombre_estudiante=:nombre_estudiante,codigo_estudiante=:codigo_estudiante,celular_estudiante=:celular_estudiante WHERE id_estudiante=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        $stmt->bindParam(":nombre_estudiante", $nombre_estudiante);
        $stmt->bindParam(":codigo_estudiante", $codigo_estudiante);
        $stmt->bindParam(":celular_estudiante", $celular_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo para eliminar un estudiante
    public function eliminarEstudiante($id_estudiante)
    {
        $query = "DELETE FROM estudiante WHERE id_estudiante=:id_estudiante";
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

    // Metodo que permite asignar un estudiante a una empresa especifica.
    public function vincularEstudianteConEmpresa($id_estudiante, $id_empresa)
    {
        $query = "UPDATE estudiante SET id_empresa=:id_empresa WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que permite asignarle a un estudiante un tutor
    public function vincularEstudianteConTutor($id_estudiante, $id_tutor)
    {
        $query = "UPDATE estudiante SET id_tutor=:id_tutor WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":id_tutor", $id_tutor);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Meotodo que permite listar la informacion de todos los estudiantes
    public function listarEstudiantes()
    {
        $query = "SELECT es.nombre_estudiante, es.codigo_estudiante, es.correo_estudiante, es.celular_estudiante, 
                  em.nombre_empresa AS nombre_empresa, t.nombre_tutor AS nombre_tutor
                  FROM estudiante AS es LEFT JOIN empresa AS em ON es.id_empresa=em.id_empresa
                  LEFT JOIN tutor AS t ON es.id_tutor=t.id_tutor";
        $lista_estudiantes = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_estudiantes[] = $result;
            }
            $stmt->closeCursor();
            return $lista_estudiantes;
        }
    }

    // Metodo que lista y datos los estudiantes que estan asignados a cierta empresa
    public function listarEstudiantesPorEmpresa($id_empresa)
    {
        $query = "SELECT e.id_estudiante, e.id_tutor, e.nombre_estudiante, e.codigo_estudiante, e.correo_estudiante, e.celular_estudiante, t.nombre_tutor
        FROM estudiante e LEFT JOIN tutor t ON e.id_tutor = t.id_tutor
        WHERE e.id_empresa=:id_empresa";
        $lista_estudiantes = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_estudiantes[] = $result;
            }
            $stmt->closeCursor();
            return $lista_estudiantes;
        }
    }

    // Metodo que me retorna la cantidad de estudiantes asignados a una empresa
    public function cantidadEstudiantesPorEmpresa($id_empresa)
    {
        $query = "SELECT COUNT(*) AS cantidad FROM estudiante WHERE id_empresa=:id_empresa";
        $cantidad_estudiantes = 0;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if (!is_null($result)) {
                $cantidad_estudiantes = $result['cantidad'];
            }
            return $cantidad_estudiantes;
        }
    }

    // Metodo para buscar y mostrar informacion de un estudiante
    public function buscarEstudiante($id_estudiante)
    {
        $query = "SELECT id_estudiante,id_empresa,nombre_estudiante, codigo_estudiante,correo_estudiante,celular_estudiante FROM estudiante WHERE id_estudiante=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $datos_del_estudiante = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $datos_del_estudiante;
        }
    }

    // Verifica si existe una empresa mediante el correo electrónico y la contraseña
    public function verificarExistenciaEstudiante($correo_estudiante)
    {
        $datos = NULL;
        $query = "SELECT id_estudiante, nombre_estudiante FROM estudiante WHERE correo_estudiante=:correo_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":correo_estudiante", $correo_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $datos = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $datos;
        }
    }
}
