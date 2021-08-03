<?php
require_once '../../Model/DAO/Director_Model.php';

function buscarDirector($id_director)
{
    $obj_director_model = new DirectorModel();
    return $obj_director_model->buscarDirector($id_director);
}

//Metodo para eliminar los ficheros cargados por el estudiante correspondiente a los documentos del estudiante
function eliminarFicheros()
{
    $files = glob('../../Documentos/CartaCompromisoria/*'); //obtenemos todos los nombres de los ficheros
    $files2 = glob('../../Documentos/InformeAvance/*'); //obtenemos todos los nombres de los ficheros
    foreach ($files as $file) {
        if (is_file($file))
            unlink($file); //elimino el fichero
    }
    foreach ($files2 as $file2) {
        if (is_file($file2))
            unlink($file2); //elimino el fichero
    }
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'editar_director') {
        $id_director = $_POST['id_director'];
        $nombre_director = $_POST['nombre_director'];
        $correo_director = $_POST['correo_director'];
        $obj_director_model = new DirectorModel();
        // Validar la extensión ufps.edu.co
        $extension = strrchr($correo_director, "@");

        if ($extension != "@ufps.edu.co") {
            $response['state'] = "error";
            $response['title'] = "El correo debe ser institucional";
            $response['location'] = "perfil.php";
        } else {
            $rta = $obj_director_model->actualizarDirector($id_director, $correo_director, $nombre_director);
            if ($rta == 0) {
                $response['title'] = "Error al actualizar coordinador";
                $response['state'] = "error";
                $response['location'] = "perfil.php";
            } else {
                $response['title'] = "Director actualizado correctamente";
                $response['state'] = "success";
                $response['location'] = "perfil.php";
            }
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == 'finalizar_semestre') {
        $obj_director_model = new DirectorModel();
        $rtaEstudiante = $obj_director_model->vaciarTablaEstudiante();
        $rtaGrupo = $obj_director_model->vaciarTablaGrupo();
        $rtaSemestre = $obj_director_model->vaciarTablaSemestre();

        if ($rtaEstudiante == 0 || $rtaGrupo == 0 || $rtaSemestre == 0) {
            $response['title'] = "Error al finalizar el semestre";
            $response['state'] = "error";
            $response['location'] = "semestre.php";
        } else {
            eliminarFicheros();
            $response['title'] = "Semestre finalizado correctamente";
            $response['state'] = "success";
            $response['location'] = "semestre.php";
        }
        echo json_encode($response);
    }
}
