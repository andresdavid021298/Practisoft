<?php

include_once "../Config/db._config.php";

class CoordinadorModel{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct() {
        $this->conexion=Conexion::conectar();
    }

    //Metodo para Insertar Coordinador
    public function insertarCoordinador($nombre_coordinador, $correo_coordinador, $codigo_coordinador, $celular_coordinador){
        $query = "INSERT INTO coordinador VALUES(NULL, :nombre_coordinador, :correo_coordinador, :codigo_coordinador, :celular_coordinador)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre_coordinador", $nombre_coordinador);
        $stmt->bindParam(":correo_coordinador", $correo_coordinador);
        $stmt->bindParam(":codigo_coordinador", $codigo_coordinador);
        $stmt->bindParam(":celular_coordinador", $celular_coordinador);

        if(!$stmt->execute()){
            $stmt->closeCursor();
            return 0;
        }
        else{
            $stmt->closeCursor();
            return 1;
        }
    }

    //Metodo para actualizar Coordinador
    public function actualizarCoordinador($id_coordinador, $correo_coordinador, $celular_coordinador){
        $query = "UPDATE coordinador SET correo_coordinador=:correo, celular_coordinador=:celular WHERE id_coordinador=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_coordinador);
        $stmt->bindParam(":correo", $correo_coordinador);
        $stmt->bindParam(":celular", $celular_coordinador);

        if(!$stmt->execute()){
            $stmt->closeCursor();
            return 0;
        }
        else{
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que muestra el listado de los coordinadores
    public function listarCoordinadores()
    {
        $query = "SELECT id_coordinador, nombre_coordinador, correo_coordinador, codigo_coordinador, celular_coordinador FROM coordinador";
        $lista_coordinador = NULL;
        
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_coordinador[] = $result;
            }
            $stmt->closeCursor();
            return $lista_coordinador;
        }
    }

    // Metodo para eliminar Coordinador
    public function eliminarCoordinador($id_coordinador){
        $query = "DELETE FROM coordinador WHERE id_coordinador = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_coordinador);

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
