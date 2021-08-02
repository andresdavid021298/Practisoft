<?php
require_once '../../Model/DAO/Historico_Model.php';

// Método que conecta con el modelo para retornar cantidad de solicitudes de capacitación según una fecha determinada
function cantidadAreasCapacitacionPorEmpresaYFecha($fecha_inicio, $fecha_fin)
{
    $obj_historico_model = new HistoricoModel();
    return $obj_historico_model->cantidadAreasCapacitacionPorEmpresaYFecha($fecha_inicio, $fecha_fin);
}

// Método que conecta con el modelo para retornar cantidad de solicitudes de desarrollo según una fecha determinada
function cantidadAreasDesarrolloDeSoftwarePorEmpresaYFecha($fecha_inicio, $fecha_fin)
{
    $obj_historico_model = new HistoricoModel();
    return $obj_historico_model->cantidadAreasDesarrolloDeSoftwarePorEmpresaYFecha($fecha_inicio, $fecha_fin);
}

// Método que conecta con el modelo para retornar cantidad de solicitudes de mantenimiento según una fecha determinada
function cantidadAreasMantenimientoPorEmpresaYFecha($fecha_inicio, $fecha_fin)
{
    $obj_historico_model = new HistoricoModel();
    return $obj_historico_model->cantidadAreasMantenimientoPorEmpresaYFecha($fecha_inicio, $fecha_fin);
}

// Método que conecta con el modelo para retornar cantidad de solicitudes de Servidores según una fecha determinada
function cantidadAreasServidoresPorEmpresaYFecha($fecha_inicio, $fecha_fin)
{
    $obj_historico_model = new HistoricoModel();
    return $obj_historico_model->cantidadAreasServidoresPorEmpresaYFecha($fecha_inicio, $fecha_fin);
}

// Método que conecta con el modelo para retornar cantidad de solicitudes de Servidores según una fecha determinada
function cantidadAreasRedesPorEmpresaYFecha($fecha_inicio, $fecha_fin)
{
    $obj_historico_model = new HistoricoModel();
    return $obj_historico_model->cantidadAreasRedesPorEmpresaYFecha($fecha_inicio, $fecha_fin);
}
