<?php

include_once "../Config/db._config.php";

class CoordinadorModel{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct() {
        $this->conexion=Conexion::conectar();
    }

    //Metodo para Insertar Coordinador
    public function insertarDirector($nombre_director, $correo_director, $codigo_director, $celular_director){
        $query = "INSERT INTO director VALUES(NULL, :nombre_director, :correo_director, :codigo_director, :celular_director)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre_director", $nombre_director);
        $stmt->bindParam(":correo_director", $correo_director);
        $stmt->bindParam(":codigo_director", $codigo_director);
        $stmt->bindParam(":celular_director", $celular_director);

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
    public function actualizarDirector($id_director, $correo_director, $celular_director){
        $query = "UPDATE director SET correo_director=:correo, celular_director=:celular WHERE id_director=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_director);
        $stmt->bindParam(":correo", $correo_director);
        $stmt->bindParam(":celular", $celular_director);

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
    public function listarDirectores()
    {
        $query = "SELECT id_director, nombre_director, correo_director, codigo_director, celular_director FROM director";
        $lista_director = NULL;
        
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_director[] = $result;
            }
            $stmt->closeCursor();
            return $lista_director;
        }
    }

    // Metodo para eliminar Coordinador
    public function eliminarDirector($id_director){
        $query = "DELETE FROM director WHERE id_director = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_director);

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