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

    //Método para traer los nombres de los archivos de la base de datos
    public function verDocumentosBD()
    {
        $lista_documentos = NULL;
        $query = "select COLUMN_NAME 
                  from INFORMATION_SCHEMA.COLUMNS
                  where TABLE_SCHEMA = 'practisoft' and TABLE_NAME = 'documentos_empresa'
                  order by ORDINAL_POSITION";
        $stmt = $this->conexion->prepare($query);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_documentos[] = $result;
            }
            $stmt->closeCursor();
            return $lista_documentos;
        }
    }

    //Método para agregar nuevo documento a la BD
    public function agregarDocumentoBD($nombre)
    {
        $query =  "ALTER TABLE documentos_empresa ADD $nombre VARCHAR(120)";
        $stmt = $this->conexion->prepare($query);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para actualizar documento de la BD
    public function actualizarDocumentoBD($nombreAnterior, $nombreNuevo)
    {
        $query = "ALTER TABLE documentos_empresa CHANGE $nombreAnterior $nombreNuevo VARCHAR(120)";
        $stmt = $this->conexion->prepare($query);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para eliminar documento de la BD
    public function eliminarDocumentoBD($nombre)
    {
        $query = "ALTER TABLE documentos_empresa DROP $nombre";
        $stmt = $this->conexion->prepare($query);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para cargar un documento
    public function insertarDocumento($id_empresa, $columna, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_empresa(id_empresa, $columna) VALUES(:id_empresa, :nombre_archivo)";
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

    //Metodo para actualizar un documento
    public function actualizarDocumento($id_empresa, $columna, $nombre_archivo)
    {
        $query = "UPDATE documentos_empresa SET $columna = :nombre_archivo WHERE id_empresa=:id_empresa";
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

    public function verificarDocumentacion($id_empresa)
    {
        $documentos = null;
        $query = "SELECT * FROM documentos_empresa WHERE id_empresa=:id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $documentos = $result;
            }
            $stmt->closeCursor();
            return $documentos;
        }
    }

    // Metodo que retorna todos los documentos de una empresa
    public function verDocumentosEmpresa($id_empresa)
    {
        $lista_documentos = NULL;
        $query = "SELECT d.*,c.nombre_archivo 
                  FROM documentos_empresa AS d 
                  RIGHT JOIN empresa AS e ON d.id_empresa =  e.id_empresa 
                  LEFT JOIN convenio AS c ON e.id_empresa= c.id_empresa 
                  WHERE e.id_empresa = :id_empresa";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_empresa", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $lista_documentos = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $lista_documentos;
        }
    } 
}
