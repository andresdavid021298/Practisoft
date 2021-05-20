<?php
require_once '../../Model/DAO/Coordinador_Model.php';

function buscarDirector($id_director)
{
    $obj_director_model = new DirectorModel();
    return $obj_director_model->buscarDirector($id_director);
}
