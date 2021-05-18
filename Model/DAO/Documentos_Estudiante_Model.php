<?php

require_once "../../Config/db._config.php";

class DocumentosEstudianteModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Método para verificar si hay un registro de documento
    public function verificarRegistroDocumento($id_estudiante)
    {
        $documentos = 0;
        $query = "SELECT COUNT(*) AS numero_registros FROM documentos_estudiante WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
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

    //Metodo para listar documentos del estudiante de practicas
    public function listarDocumentosEstudiante()
    {
        $query = "SELECT id_estudiante, archivo_carta_compromisoria, archivo_informe_avance
                  FROM documentos_estudiante";
        $lista_documentos_estudiante = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_documentos_estudiante[] = $result;
            }
            $stmt->closeCursor();
            return $lista_documentos_estudiante;
        }
    }

    //Metodo para listar documentos del estudiante de practicas
    public function listarDocumentosEstudianteGrupo($id_grupo)
    {
        $query = "SELECT es.id_estudiante, es.nombre_estudiante, d.archivo_carta_compromisoria, d.archivo_informe_avance
                  FROM documentos_estudiante AS d 
                  RIGHT JOIN estudiante AS es ON d.id_estudiante = es.id_estudiante
                  RIGHT JOIN grupo AS g ON es.id_grupo = g.id_grupo
                  WHERE g.id_grupo =:id_grupo";
        $lista_documentos_estudiante = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_grupo", $id_grupo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_documentos_estudiante[] = $result;
            }
            $stmt->closeCursor();
            return $lista_documentos_estudiante;
        }
    }

    //Método para insertar el documento de carta compromisoria del estudiante
    public function insertarDocumentoCartaCompromisoria($id_estudiante, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_estudiante VALUES(NULL, :id_estudiante, :nombre_archivo, NULL)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function actualizarDocumentoCartaCompromisoria($id_estudiante, $nombre_archivo)
    {
        $query = "UPDATE documentos_estudiante SET archivo_carta_compromisoria=:nombre_archivo WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function mostrarDocumentoCartaCompromisoria($id_estudiante)
    {
        $query = "SELECT archivo_carta_compromisoria FROM documentos_estudiante WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $carta_compromisioria = $result;
            $stmt->closeCursor();
            return $carta_compromisioria;
        }
    }

    //Método para insertar el documento de carta compromisoria del estudiante
    public function insertarDocumentoInformeDeAvance($id_estudiante, $nombre_archivo)
    {
        $query = "INSERT INTO documentos_estudiante VALUES(NULL, :id_estudiante, NULL, :nombre_archivo)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function actualizarDocumentoInformeDeAvance($id_estudiante, $nombre_archivo)
    {
        $query = "UPDATE documentos_estudiante SET archivo_informe_avance=:nombre_archivo WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        $stmt->bindParam(":nombre_archivo", $nombre_archivo);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    public function mostrarDocumentoInformeDeAvance($id_estudiante)
    {
        $query = "SELECT archivo_informe_avance FROM documentos_estudiante WHERE id_estudiante=:id_estudiante";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_estudiante", $id_estudiante);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $carta_compromisioria = $result;
            $stmt->closeCursor();
            return $carta_compromisioria;
        }
    }
}
