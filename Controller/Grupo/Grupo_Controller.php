<?php

require_once "../../Model/DAO/Grupo_Model.php";

function listarGruposPorCoordinador($id_coordinador){
    $grupo = new GrupoModel();
    return $grupo->listarGrupoPorCoordinador($id_coordinador);
}

function buscarGrupo($id_grupo){
    $grupo = new GrupoModel();
    return $grupo->buscarGrupo($id_grupo);
}