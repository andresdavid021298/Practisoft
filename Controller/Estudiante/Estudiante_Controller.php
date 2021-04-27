<?php
require_once "../../Model/DAO/Estudiante_Model.php";

// Metodo que conecta con la vista para mostrar informacion de practicantes asignados a una empresa
function listarEstudiantesPorEmpresa($id_empresa)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantesPorEmpresa($id_empresa);
}

// Metodo que conecta con la vista para enviar los datos de un determinado estudiante
function buscarEstudiante($id_estudiante)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->buscarEstudiante($id_estudiante);
}
