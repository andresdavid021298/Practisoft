<?php

require_once "../../Config/db._config.php";

class DocumentosEmpresaModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Método para cargar el documento de protocolos de bioseguridad
    public function insertarDocumentoProtocolos($id_empresa, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_empresa VALUES(NULL, :id_empresa, :nombre_archivo, NULL, NULL)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para verificar si hay un registro de documento
    public function verificarRegistroDocumento($id_empresa)
    {
        $documentos = 0;
        $query = "SELECT COUNT(*) AS numero_registros FROM documentos_empresa WHERE id_empresa=:id_empresa";
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

    //Método para actualizar el documento de protocolos de bioseguridad
    public function actualizarDocumentoProtocolos($id_empresa, $nombre_archivo)
    {
        $query = "UPDATE documentos_empresa SET archivo_protocolos_bio=:nombre_archivo WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para mostrar el documento de protocolos de bioseguridad
    public function mostrarProtocolos($id_empresa)
    {
        $doc_protocolos = NULL;
        $query = "SELECT archivo_protocolos_bio FROM documentos_empresa WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $doc_protocolos = $result;
            $stmt->closeCursor();
            return $doc_protocolos;
        }
    }

    //Método para mostrar el certificado de existencia de la empresa
    public function mostrarCertificado($id_empresa)
    {
        $doc_certificado = NULL;
        $query = "SELECT archivo_certificado_existencia FROM documentos_empresa WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $doc_certificado = $result;
            $stmt->closeCursor();
            return $doc_certificado;
        }
    }
}
