<?php

include_once "../../Config/db._config.php";

class DirectorModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Metodo para actualizar Director
    public function actualizarDirector($id_director, $correo_director, $nombre_director)
    {
        $query = "UPDATE director SET correo_director=:correo, nombre_director=:nombre WHERE id_director=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_director);
        $stmt->bindParam(":correo", $correo_director);
        $stmt->bindParam(":nombre", $nombre_director);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que muestra buscar director por ID
    public function buscarDirector($id_director)
    {
        $query = "SELECT id_director, nombre_director, correo_director FROM director WHERE id_director=:id";
        $datos_director = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_director);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $datos_director = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $datos_director;
        }
    }

    // Metodo que permite buscar un director por el correo
    public function buscarDirectorPorCorreo($correo_director)
    {
        $query = "SELECT id_director, nombre_director FROM director WHERE correo_director=:correo";
        $datos_director = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":correo", $correo_director);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $datos_director = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $datos_director;
        }
    }

    // Metodo que permite eliminar los valores de la tabla grupo
    public function vaciarTablaGrupo(){
        $query = "DELETE FROM grupo";
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que permite eliminar los valores de la tabla estudiante
    public function vaciarTablaEstudiante(){
        $query = "DELETE FROM estudiante";
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que permite eliminar los valores de la tabla semestre
    public function vaciarTablaSemestre(){
        $query = "TRUNCATE TABLE semestre";
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }
}
