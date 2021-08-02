<?php

require_once "../../Config/db._config.php";

class TutorModel
{

    //Atributo para manejar la conexion con la base de datos
    private $conexion;

    //Contructor que inicializa la conexion
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo que inserta un tutor
    public function insertarTutor($nombre_tutor, $correo_tutor, $celular_tutor, $id_empresa)
    {
        $query = "INSERT INTO tutor(nombre_tutor, correo_tutor, celular_tutor, id_empresa) VALUES(:nombre, :correo, :celular, :id_empresa)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre_tutor);
        $stmt->bindParam(":correo", $correo_tutor);
        $stmt->bindParam(":celular", $celular_tutor);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que actualiza un tutor
    public function actualizarTutor($id_tutor, $nombre_tutor, $correo_tutor, $celular_tutor)
    {
        $query = "UPDATE tutor SET nombre_tutor=:nombre, correo_tutor=:correo, celular_tutor=:celular WHERE id_tutor=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_tutor);
        $stmt->bindParam(":nombre", $nombre_tutor);
        $stmt->bindParam(":correo", $correo_tutor);
        $stmt->bindParam(":celular", $celular_tutor);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que devuelve un listado con todos los tutores
    public function listarTutores()
    {
        $query = "SELECT nombre_tutor, correo_tutor, celular_tutor FROM tutor";
        $lista_tutores = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_tutores[] = $result;
            }
            $stmt->closeCursor();
            return $lista_tutores;
        }
    }

    //Metodo para eliminar un tutor
    public function eliminarTutor($id_tutor){
        $query = "DELETE FROM tutor WHERE id_tutor=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_tutor);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }   

    //Metodo para mostrar la informacion de los tutores segun la empresa
    public function mostrarDatosTutorPorEmpresa($id_empresa){
        $lista_tutores = NULL;
        $query = "SELECT id_tutor, nombre_tutor, correo_tutor, celular_tutor 
                  FROM tutor
                  WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_tutores[] = $result;
            }
            $stmt->closeCursor();
            return $lista_tutores;
        }
    }

    //Método para mostrar la información del tutor
    public function mostrarDatosTutor($id_tutor)
    {
        $datos_tutor = NULL;
        $query = "SELECT nombre_tutor, correo_tutor, celular_tutor
                  FROM tutor WHERE id_tutor=:id_tutor";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_tutor", $id_tutor);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $datos_tutor[] = $result;
            $stmt->closeCursor();
            return $datos_tutor;
        }
    }
}