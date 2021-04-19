<?php

include_once "../Config/db._config.php";

class EmpresaModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    //Contructor que inicializa la conexion
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo que inserta una nueva empresa
    public function insertarEmpresa($nombre_empresa, $representante, $direccion, $correo, $celular, $sector, $clave)
    {
        $query = "INSERT INTO empresa(nombre_empresa,representante_legal,direccion_empresa,correo_empresa,celular_empresa,sector_empresa,clave_empresa) VALUES(:nombre,:representante,:direccion,:correo,:celular,:sector,:clave)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre_empresa);
        $stmt->bindParam(":representante", $representante);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":celular", $celular);
        $stmt->bindParam(":sector", $sector);
        $stmt->bindParam(":clave", $clave);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que actualiza una empresa
    public function actualizarEmpresa($id_empresa, $direccion, $celular, $descripcion, $tutor)
    {
        $query = "UPDATE empresa SET direccion_empresa=:direccion,celular_empresa=:celular,descripcion_empresa=:descripcion,tutor=:tutor WHERE id_empresa=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":celular", $celular);
        $stmt->bindParam(":tutor", $tutor);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que devuelve un listado con todas las empresas
    public function listarEmpresas()
    {
        $query = "SELECT id_empresa,nombre_empresa,representante_legal,direccion_empresa,celular_empresa,correo_empresa,sector_empresa,descripcion_empresa,tutor FROM empresa";
        $lista_empresas = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_empresas[] = $result;
            }
            $stmt->closeCursor();
            return $lista_empresas;
        }
    }

    // Metodo que cambia la clave de una empresa
    public function cambiarClave($id_empresa, $nueva_clave)
    {
        $query = "UPDATE empresa SET clave_empresa=:nueva_clave WHERE id_empresa=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":nueva_clave", $nueva_clave);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }
}
