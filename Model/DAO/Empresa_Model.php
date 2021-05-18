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
    public function insertarEmpresa($nombre_empresa, $representante, $nit, $direccion, $municipio, $correo, $pagina_web, $celular, $telefono, $sector, $actividad, $clave)
    {
        $query = "INSERT INTO empresa(nombre_empresa,representante_legal,nit_empresa,direccion_empresa,municipio_empresa,correo_empresa,web_empresa,celular_empresa,telefono_empresa,sector_empresa,actividad_empresa,clave_empresa) VALUES(:nombre,:representante,:nit,:direccion,:municipio,:correo,:pagina_web,:celular,:telefono,:sector,:actividad,:clave)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre_empresa);
        $stmt->bindParam(":representante", $representante);
        $stmt->bindParam(":nit", $nit);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":municipio", $municipio);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":pagina_web", $pagina_web);
        $stmt->bindParam(":celular", $celular);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":sector", $sector);
        $stmt->bindParam(":actividad", $actividad);
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
    public function actualizarEmpresa($id_empresa, $representante_legal, $direccion, $municipio, $correo, $pagina_web, $celular, $telefono)
    {
        $query = "UPDATE empresa SET representante_legal=:representante, direccion_empresa=:direccion, municipio_empresa=:municipio,
                  correo_empresa=:correo, celular_empresa=:celular,telefono_empresa=:telefono,web_empresa=:pagina_web WHERE id_empresa=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":representante", $representante_legal);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":municipio", $municipio);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":celular", $celular);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":pagina_web", $pagina_web);
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
        $query = "SELECT e.id_empresa,e.nombre_empresa, e.celular_empresa,e.direccion_empresa,e.representante_legal,e.sector_empresa,e.correo_empresa, c.fecha_inicio,c.fecha_expiracion FROM empresa AS e LEFT JOIN convenio AS c ON e.id_empresa = c.id_empresa";
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
                  correo_empresa,web_empresa, celular_empresa,telefono_empresa, sector_empresa, actividad_empresa
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

    //Método para mostrar el id y el nombre de la empresa
    public function mostrarIdYNombreEmpresa($correo_empresa)
    {
        $datos_empresa = NULL;
        $query = "SELECT id_empresa, nombre_empresa, correo_empresa FROM empresa WHERE correo_empresa=:correo_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":correo_empresa", $correo_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $datos_empresa = $result;
            $stmt->closeCursor();
            return $datos_empresa;
        }
    }

    //Método para generar los datos del informe de empresas
    public function generarInformeDeEmpresas()
    {
        $lista_actividades = NULL;
        $query = "SELECT * FROM empresa";
        $stmt = $this->conexion->prepare($query);
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

    //Método para activar el estado de la empresa
    public function activarEstadoEmpresa($id_empresa)
    {
        $query = "UPDATE empresa SET estado='Activo' WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para verificar el estado de la empresa
    public function verificarEstadoEmpresa($id_empresa)
    {
        $query = "SELECT estado FROM empresa WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $result;
        }
    }

    // Metodo que duevuelve el total de empresas según la actividad económica
    public function verCantidadEmpresasSegunActividad()
    {
        $lista_empresas = NULL;
        $query = "SELECT actividad_empresa, COUNT(*) as cantidad_empresa FROM empresa GROUP BY actividad_empresa";
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_empresas[] = $cantidad;
            }
            $stmt->closeCursor();
            return $lista_empresas;
        }
    }

    // Metodo que duevuelve el total de empresas según el sector
    public function verCantidadEmpresasSegunSector()
    {
        $lista_empresas = NULL;
        $query = "SELECT sector_empresa, COUNT(*) as cantidad_empresa FROM empresa GROUP BY sector_empresa";
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_empresas[] = $cantidad;
            }
            $stmt->closeCursor();
            return $lista_empresas;
        }
    }
}
