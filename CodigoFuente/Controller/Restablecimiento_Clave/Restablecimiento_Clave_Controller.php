<?php

require_once '../../Model/DAO/Restablecimiento_Clave_Model.php';

function buscarSolicitudRestablecimientoClave($id_empresa, $token)
{
    $obj = new RestablecimientoClaveModel();
    return $obj->buscarSolicitudRestablecimientoClave($id_empresa, $token);
}
