<?php

include_once "../../Config/db._config.php";

class GrupoModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    //Metodo para Insertar grupo
    public function insertarGrupo($nombre_grupo, $id_coordinador)
    {
        $query = "INSERT INTO grupo VALUES(NULL, :nombre_grupo, :id_coordinador)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre_grupo", $nombre_grupo);
        $stmt->bindParam(":id_coordinador", $id_coordinador);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Metodo para actualizar grupo
    public function actualizarGrupo($id_grupo, $nombre_grupo, $id_coordinador)
    {
        $query = "UPDATE grupo SET nombre_grupo=:nombre_grupo, id_coordinador=:id_coordinador WHERE id_grupo=:id_grupo";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_grupo", $id_grupo);
        $stmt->bindParam(":nombre_grupo", $nombre_grupo);
        $stmt->bindParam(":id_coordinador", $id_coordinador);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que muestra el listado de los grupos
    public function listarGrupo()
    {
        $query = "SELECT id_grupo, nombre_grupo, id_coordinador FROM grupo";
        $lista_grupo = NULL;

        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_grupo[] = $result;
            }
            $stmt->closeCursor();
            return $lista_grupo;
        }
    }

    public function listarGrupoPorCoordinador($id_coordinador)
    {
        $query = "SELECT id_grupo, nombre_grupo, id_coordinador FROM grupo WHERE id_coordinador=:id_coordinador";
        $lista_grupo = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_coordinador", $id_coordinador);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_grupo[] = $result;
            }
            $stmt->closeCursor();
            return $lista_grupo;
        }
    }

    // Metodo para eliminar grupo
    public function eliminarGrupo($id_grupo)
    {
        $query = "DELETE FROM grupo WHERE id_grupo = :id_grupo";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_grupo", $id_grupo);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Método para buscar grupo
    public function buscarGrupo($id_grupo)
    {
        $query = "SELECT id_grupo, nombre_grupo, id_coordinador 
        FROM grupo
        WHERE id_grupo=:id_grupo";
        $grupo = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_grupo", $id_grupo);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $grupo = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $grupo;
        }
    }

    // Metodo para buscar grupos por coordinador
    public function buscarGruposCoordinador($id_coordinador)
    {
        $query = "SELECT * FROM grupo WHERE id_coordinador=:id_coordinador";
        $grupos = null;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_coordinador", $id_coordinador);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            if ($stmt->rowCount() > 0) {
                $grupos[] = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            $stmt->closeCursor();
            return $grupos;
        }
    }
}
