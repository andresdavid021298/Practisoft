<?php

require_once "../../Config/db._config.php";

class EmpresaModel
{

    //Atributo para manejar la conexion con la base de datos
    private $conexion;

    //Contructor que inicializa la conexion
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo que inserta una nueva empresa
    public function insertarEmpresa($nombre_empresa, $representante, $nit, $direccion, $municipio, $correo, $celular, $sector, $clave)
    {
        $query = "INSERT INTO empresa(nombre_empresa,representante_legal,nit_empresa,direccion_empresa,municipio_empresa,correo_empresa,celular_empresa,sector_empresa,clave_empresa) VALUES(:nombre,:representante,:nit,:direccion,:municipio,:correo,:celular,:sector,:clave)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre_empresa);
        $stmt->bindParam(":representante", $representante);
        $stmt->bindParam(":nit", $nit);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":municipio", $municipio);
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
    public function actualizarEmpresa($id_empresa, $representante_legal, $direccion, $municipio, $correo, $celular)
    {
        $query = "UPDATE empresa SET representante_legal=:representante, direccion_empresa=:direccion, municipio_empresa=:municipio,
                  correo_empresa=:correo, celular_empresa=:celular WHERE id_empresa=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":representante", $representante_legal);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":municipio", $municipio);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":celular", $celular);
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
        $query = "SELECT id_empresa,nombre_empresa,representante_legal,direccion_empresa,celular_empresa,correo_empresa,sector_empresa,descripcion_empresa FROM empresa";
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

    // Metodo que duevuelve el total de empresas que estan registradas en el sistema
    public function verCantidadEmpresas()
    {
        $query = "SELECT COUNT(*) as cantidad_empresa FROM empresa";
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $cantidad = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $cantidad;
        }
    }

    // Verifica 
    public function verificarExistencia($correo, $clave)
    {
        $query = "SELECT id_empresa, nombre_empresa,clave_empresa FROM empresa WHERE correo_empresa=:correo";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":correo", $correo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($clave, $result['clave_empresa'])) {
                    $datos_empresa = NULL;
                    $datos_empresa['id_empresa'] = $result['id_empresa'];
                    $datos_empresa['nombre_empresa'] = $result['nombre_empresa'];
                    return $datos_empresa;
                    break;
                }
            }
            return 2;
        }
    }
    //Método para mostrar la información del perfil de la empresa
    public function mostrarDatos($id_empresa)
    {
        $datos_empresa = NULL;
        $query = "SELECT nombre_empresa, nit_empresa, representante_legal, direccion_empresa, municipio_empresa,
                  correo_empresa, celular_empresa, sector_empresa, actividad_empresa
                  FROM empresa WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $datos_empresa[] = $result;
            $stmt->closeCursor();
            return $datos_empresa;
        }
    }
    //Metodo para mostrar la información de la empresa a la que fue asignado un estudiante
    public function verEmpresaAsignadaEstudiante($id_estudiante)
    {
        $datos_empresa = NULL;
        $query = "SELECT e.nombre_empresa,e.direccion_empresa, e.celular_empresa,t.nombre_tutor 
                FROM empresa AS e 
                JOIN estudiante AS est ON e.id_empresa=est.id_empresa 
                LEFT JOIN tutor AS t ON t.id_tutor=est.id_tutor 
                WHERE est.id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $datos_empresa = $result;
            }
            $stmt->closeCursor();
            return $datos_empresa;
        }
    }

    // id_empresa, nombre_empresa
}
