<?php

require_once "../../Config/db._config.php";

class RestablecimientoClaveModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Método para insertar una solicitud de cambio de clave
    public function insertarSolicitudCambioClave($id_empresa, $token)
    {
        $query = "INSERT INTO restablecimiento_clave VALUES(NULL, :id_empresa, :token, NULL)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        $stmt->bindParam(":token", $token);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para buscar solicitud de restablecimiento de clave
    public function buscarSolicitudRestablecimientoClave($id_empresa, $token)
    {
        $datos_solicitud = NULL;
        $query = "SELECT * FROM restablecimiento_clave WHERE id_empresa=:id_empresa AND token=:token";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        $stmt->bindParam(":token", $token);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $datos_solicitud = $result;
            }
            $stmt->closeCursor();
            return $datos_solicitud;
        }
    }
}
