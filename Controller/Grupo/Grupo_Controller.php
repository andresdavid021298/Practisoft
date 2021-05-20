<?php

require_once "../../Model/DAO/Grupo_Model.php";

function listarGrupos(){
    $grupo = new GrupoModel();
    return $grupo->listarGrupo();
}

function listarGruposPorCoordinador($id_coordinador){
    $grupo = new GrupoModel();
    return $grupo->listarGrupoPorCoordinador($id_coordinador);
}

function buscarGrupo($id_grupo){
    $grupo = new GrupoModel();
    return $grupo->buscarGrupo($id_grupo);
}

if(isset($_POST['accion'])){
    if ($_POST['accion'] == "crear_grupo"){
        $nombre_grupo = $_POST['nombre_grupo'];
        $id_coordinador = $_POST['id_coordinador'];
        $obj_grupo_model = new GrupoModel();
        $rta = $obj_grupo_model->insertarGrupo($nombre_grupo, $id_coordinador);
        if($rta == 0){
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
            $response['location'] = "crear_grupos.php";
        }
        else{
            $response['title'] = "Grupo creado correctamente";
            $response['state'] = "success";
            $response['location'] = "crear_grupos.php";
        }
        echo json_encode($response);
    } else if($_POST['accion'] == "eliminar_grupo"){
        $id_grupo = $_POST['id_grupo'];
        $obj_grupo_model = new GrupoModel();
        $rta = $obj_grupo_model->eliminarGrupo($id_grupo);
        if($rta == 0){
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
            $response['location'] = "crear_grupos.php";
        }
        else{
            $response['title'] = "Grupo eliminado correctamente";
            $response['state'] = "success";
            $response['location'] = "crear_grupos.php";
        }
        echo json_encode($response);
    }
}