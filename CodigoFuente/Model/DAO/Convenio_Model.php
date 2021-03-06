<?php

require_once "../../Config/db._config.php";

class ConvenioModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Método para agregar convenios
    public function insertarConvenio($id_empresa, $nombre_archivo, $fecha_inicio, $fecha_expiracion)
    {
        $query = "INSERT INTO convenio VALUES(NULL, :id_empresa, :nombre_archivo, :fecha_inicio, :fecha_expiracion)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_expiracion", $fecha_expiracion);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para mostrar los datos del convenio
    public function mostrarConvenio($id_empresa)
    {
        $datos_convenio = NULL;
        $query = "SELECT nombre_archivo, fecha_inicio, fecha_expiracion FROM convenio WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $datos_convenio = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $datos_convenio;
        }
    }

    //Método para verificar si hay un registro de documento
    public function verificarRegistroDocumento($id_empresa)
    {
        $documentos = 0;
        $query = "SELECT COUNT(*) AS numero_registros FROM convenio WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $documentos = $result['numero_registros'];
            }
            $stmt->closeCursor();
            return $documentos;
        }
    }

    //Método para actualizar el convenio
    public function actualizarConvenio($id_empresa, $nombre_archivo, $fecha_inicio, $fecha_expiracion)
    {
        $query = "UPDATE convenio SET nombre_archivo=:nombre_archivo, fecha_inicio=:fecha_inicio, fecha_expiracion=:fecha_expiracion
                  WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        $stmt->bindParam(":fecha_inicio", $fecha_inicio);
        $stmt->bindParam(":fecha_expiracion", $fecha_expiracion);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }
}
