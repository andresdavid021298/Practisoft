<?php

require_once "../../Config/db._config.php";

class SolicitudModel
{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    //Contructor que inicializa la conexion
    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    // Metodo que inserta una nueva solicitud
    public function insertarSolicitud($id_empresa, $numero_practicantes, $funciones)
    {
        $query = "INSERT INTO solicitud(id_empresa, numero_practicantes, funciones) VALUES(:id,:practicantes,:funciones)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":practicantes", $numero_practicantes);
        $stmt->bindParam(":funciones", $funciones);


        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que actualiza una solicitud
    public function actualizarSolicitud($id_empresa, $numero_practicantes, $funciones)
    {
        $query = "UPDATE solicitud SET numero_practicantes=:practicante,funciones=:funciones WHERE id_empresa=:id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        $stmt->bindParam(":practicantes", $numero_practicantes);
        $stmt->bindParam(":funciones", $funciones);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    // Metodo que devuelve un listado con todas las solicitudes que se encuentren en estado EN ESPERA con informacion de la empresa y los documentos
    public function listarSolicitudes()
    {
        $query = "SELECT s.id_empresa, s.fecha_solicitud, s.id_solicitud, e.nombre_empresa, s.numero_practicantes, s.funciones, s.estado_solicitud, d.archivo_protocolos_bio, c.nombre_archivo, 
                  d.archivo_cc_representante, d.archivo_certificado_existencia 
                  FROM solicitud AS s
                  INNER JOIN empresa AS e ON s.id_empresa = e.id_empresa
                  LEFT JOIN documentos_empresa AS d ON e.id_empresa = d.id_empresa
                  LEFT JOIN convenio c ON e.id_empresa = c.id_empresa
                  WHERE s.estado_solicitud = 'En Espera'";
        $lista_solicitud = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_solicitud[] = $result;
            }
            $stmt->closeCursor();
            return $lista_solicitud;
        }
    }

    // Metodo que devuelve un listado con todas las solicitudes que se encuentren en estado APROBADA con informacion de la empresa y los documentos
    public function listarSolicitudesAprobadas()
    {
        $query = "SELECT s.id_empresa, s.fecha_solicitud, s.id_solicitud, e.nombre_empresa, s.numero_practicantes, s.funciones, s.estado_solicitud, d.archivo_protocolos_bio, c.nombre_archivo, 
                  d.archivo_cc_representante, d.archivo_certificado_existencia 
                  FROM solicitud AS s
                  INNER JOIN empresa AS e ON s.id_empresa = e.id_empresa
                  LEFT JOIN documentos_empresa AS d ON e.id_empresa = d.id_empresa
                  LEFT JOIN convenio c ON e.id_empresa = c.id_empresa
                  WHERE s.estado_solicitud = 'Aprobada'";
        $lista_solicitud = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_solicitud[] = $result;
            }
            $stmt->closeCursor();
            return $lista_solicitud;
        }
    }

    // Metodo que devuelve un listado con todas las solicitudes que se encuentren en estado EN ESPERA con informacion de la empresa y los documentos
    public function listarSolicitudesRechazadas()
    {
        $query = "SELECT s.id_empresa, s.fecha_solicitud, s.id_solicitud, e.nombre_empresa, s.numero_practicantes, s.funciones, s.estado_solicitud, d.archivo_protocolos_bio, c.nombre_archivo, 
                  d.archivo_cc_representante, d.archivo_certificado_existencia 
                  FROM solicitud AS s
                  INNER JOIN empresa AS e ON s.id_empresa = e.id_empresa
                  LEFT JOIN documentos_empresa AS d ON e.id_empresa = d.id_empresa
                  LEFT JOIN convenio c ON e.id_empresa = c.id_empresa
                  WHERE s.estado_solicitud = 'Rechazada'";
        $lista_solicitud = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_solicitud[] = $result;
            }
            $stmt->closeCursor();
            return $lista_solicitud;
        }
    }

    // Metodo que devuelve un listado con todas las solicitudes
    public function listarSolicitudesPorEmpresa($id_empresa)
    {
        $query = "SELECT id_solicitud, fecha_solicitud, id_empresa, numero_practicantes, funciones, observaciones_solicitud, estado_solicitud 
                FROM solicitud 
                WHERE id_empresa = :id";
        $lista_solicitud = NULL;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista_solicitud[] = $result;
            }
            $stmt->closeCursor();
            return $lista_solicitud;
        }
    }

    // Metodo que retorna la cantidad de solicitudes aporbadas a una empresa
    public function cantidadSolicitudesAprobadasPorEmpresa($id_empresa)
    {
        $query = "SELECT COUNT(*) as cantidad 
        FROM solicitud 
        WHERE id_empresa = :id AND estado_solicitud='Aprobada'";
        $cantidad_solicitudes_aprobadas = 0;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!is_null($result)) {
                $cantidad_solicitudes_aprobadas = $result['cantidad'];
            }
            return $cantidad_solicitudes_aprobadas;
        }
    }

    // Metodo que retorna la cantidad de solicitudes en espera de una empresa
    public function cantidadSolicitudesEnEsperaPorEmpresa($id_empresa)
    {
        $query = "SELECT COUNT(*) as cantidad 
        FROM solicitud 
        WHERE id_empresa = :id AND estado_solicitud='En Espera'";
        $cantidad_solicitudes_aprobadas = 0;
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_empresa);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!is_null($result)) {
                $cantidad_solicitudes_aprobadas = $result['cantidad'];
            }
            return $cantidad_solicitudes_aprobadas;
        }
    }

    // Metodo para eliminar solicitud
    public function eliminarSolicitud($id_solicitud)
    {
        $query = "DELETE FROM solicitud WHERE id_solicitud = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id", $id_solicitud);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para validar la solicitud de una empresa
    public function cambiarSolicitudAprobada($id_solicitud)
    {
        $query = "UPDATE solicitud SET estado_solicitud = 'Aprobada', observaciones_solicitud = NULL WHERE id_solicitud=:id_solicitud";
        $stmt  = $this->conexion->prepare($query);
        $stmt->bindParam(":id_solicitud", $id_solicitud);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método para rechazar la solicitud de una empresa
    public function cambiarSolicitudRechazada($id_solicitud, $observaciones)
    {
        $query = "UPDATE solicitud SET estado_solicitud = 'Rechazada', observaciones_solicitud =:observaciones WHERE id_solicitud=:id_solicitud";
        $stmt  = $this->conexion->prepare($query);
        $stmt->bindParam(":id_solicitud", $id_solicitud);
        $stmt->bindParam(":observaciones", $observaciones);

        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método que disminuye el número de practicantes requeridos por solicitud
    public function disminuirNumeroDePracticantes($id_solicitud)
    {
        $query = "UPDATE solicitud SET numero_practicantes=(numero_practicantes-1) WHERE id_solicitud=:id_solicitud";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_solicitud", $id_solicitud);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $cantidad_practicantes = $this->cantidadDePracticantesPorSolicitud($id_solicitud);
            if ($cantidad_practicantes <= 0) {
                $this->eliminarSolicitud($id_solicitud);
            }
            $stmt->closeCursor();
            return 1;
        }
    }

    //Método que retorna la cantidad de prácticantes por solicitud
    public function cantidadDePracticantesPorSolicitud($id_solicitud)
    {
        $query = "SELECT numero_practicantes FROM solicitud WHERE id_solicitud=:id_solicitud";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":id_solicitud", $id_solicitud);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $numero_practicantes = $result['numero_practicantes'];
            $stmt->closeCursor();
            return $numero_practicantes;
        }
    }

    // Metodo que retorna la cantidad de solicitudes de las empresas
    public function cantidadSolicitudesPorEmpresa()
    {
        $query = "SELECT e.nombre_empresa, COUNT(s.id_empresa) as 'cantidad_solicitudes'
        FROM empresa AS e LEFT JOIN solicitud AS s ON e.id_empresa=s.id_empresa GROUP BY e.nombre_empresa";
        $cantidad_solicitudes = NULL;
        $stmt = $this->conexion->prepare($query);
        if (!$stmt->execute()) {
            $stmt->closeCursor();
            return 0;
        } else {
            while ($cantidad = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cantidad_solicitudes[] = $cantidad;
            }
            $stmt->closeCursor();
            return $cantidad_solicitudes;
        }
    }
}
