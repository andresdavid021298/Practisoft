<?php
require_once '../../Model/DAO/Director_Model.php';

function buscarDirector($id_director)
{
    $obj_director_model = new DirectorModel();
    return $obj_director_model->buscarDirector($id_director);
}

if(isset($_POST['accion'])){
    if($_POST['accion'] =='editar_director'){
        $id_director = $_POST['id_director'];
        $nombre_director = $_POST['nombre_director'];
        $correo_director = $_POST['correo_director'];
        $obj_director_model = new DirectorModel();
        $rta = $obj_director_model->actualizarDirector($id_director, $correo_director, $nombre_director);
        if($rta == 0){
            $response['title'] = "Error al actualizar coordinador";
            $response['state'] = "error";
            $response['location'] = "perfil.php";
        } else {
            $response['title'] = "Director actualizado correctamente";
            $response['state'] = "success";
            $response['location'] = "perfil.php";
        }
        echo json_encode($response);
        
    }
}