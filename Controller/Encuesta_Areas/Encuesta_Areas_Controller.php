<?php
require_once "../../Model/DAO/Encuesta_Areas_Model.php";

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'guardar_inscripcion') {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $area_capacitacion = $_POST["area_capacitacion"];
        $area_mantenimiento = $_POST["area_mantenimiento"];
        $area_desarrollo = $_POST["area_desarrollo"];
        $area_servidores = $_POST["area_servidores"];
        $area_redes = $_POST["area_redes"];
        $obj_encuesta_areas_model = new Encuesta_Areas_Model();
        $rta = $obj_encuesta_areas_model->insertarEncuesta($id_estudiante, $area_capacitacion, $area_desarrollo, $area_mantenimiento, $area_redes, $area_servidores);
        if ($rta == 0) {
            $response['title'] = "Error al guardar la encuesta de inscripcion";
            $response['state'] = "error";
        } else {
            $response['title'] = "Encuesta de Inscripcion guardada correctamente";
            $response['state'] = "success";
        }
        echo json_encode($response);
    }
}

function buscarEncuesta($id_estudiante)
{
    $obj_encuesta_areas_model = new Encuesta_Areas_Model();
    return $obj_encuesta_areas_model->buscarEncuesta($id_estudiante);
}
