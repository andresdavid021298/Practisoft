<?php

include_once "../Config/db._config.php";

class EstudianteModel{

    //Atributo ppara manejar la conexion con la base de datos
    private $conexion;

    public function __construct() {
        $this->conexion=Conexion::conectar();
    }

    public function agregarEstudiante(){
        
    }

}