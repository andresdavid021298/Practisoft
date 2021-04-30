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

    //Método para cargar el documento de protocolos de bioseguridad
    public function insertarDocumentoProtocolos($id_empresa, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_empresa VALUES(NULL, :id_empresa, :nombre_archivo, NULL, NULL, NULL)";
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

    //Metodo para insertar la cedula del representante legal
    public function insertarDocumentoRepresentante($id_empresa, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_empresa VALUES(NULL, :id_empresa, NULL, :nombre_archivo, NULL, NULL)";
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

//Metodo para actualizar el documento del representante legal
    public function actualizarDocumentoRepresentante($id_empresa, $nombre_archivo)
    {
        $query = "UPDATE documentos_empresa SET archivo_cc_representante=:nombre_archivo WHERE id_empresa=:id_empresa";
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

//Metodo para mostrar el documento de identificacion del representante legal
    public function mostrarRepresentante($id_empresa){
        $doc_representante = NULL;
        $query = "SELECT archivo_cc_representante FROM documentos_empresa WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if(!$stmt->execute()){
            $stmt->closeCursor();
            return 0;
        }
        else{
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $doc_representante = $result;
            $stmt->closeCursor();
            return $doc_representante;
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

    //Método para cargar el documento de certificado de existencia de la empresa
    public function insertarDocumentoCertificado($id_empresa, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_empresa VALUES(NULL, :id_empresa, NULL, NULL, :nombre_archivo, NULL)";
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

    //Método para actualizar el documento de certificado de existencia de la empresa
    public function actualizarDocumentoCertificado($id_empresa, $nombre_archivo)
    {
        $query = "UPDATE documentos_empresa SET archivo_certificado_existencia=:nombre_archivo WHERE id_empresa=:id_empresa";
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

    //Método para cargar el documento del RUT
    public function insertarDocumentoRUT($id_empresa, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_empresa VALUES(NULL, :id_empresa, NULL, NULL, NULL, :nombre_archivo)";
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

    //Método para actualizar el documento del RUT
    public function actualizarDocumentoRUT($id_empresa, $nombre_archivo)
    {
        $query = "UPDATE documentos_empresa SET archivo_rut=:nombre_archivo WHERE id_empresa=:id_empresa";
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

    //Método para mostrar el documento del RUT
    public function mostrarRUT($id_empresa)
    {
        $doc_certificado = NULL;
        $query = "SELECT archivo_rut FROM documentos_empresa WHERE id_empresa=:id_empresa";
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
