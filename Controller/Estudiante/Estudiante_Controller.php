<?php 
require_once "../../Model/DAO/Estudiante_Model.php";

function listarEstudiantesPorEmpresa($id_empresa){
    $obj_estudiante_model=new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantesPorEmpresa($id_empresa);
}
