<?php 

namespace Controllers;

use Model\Servicio;
use Model\Cita;
use Model\CitaServicio;

class APIController {
    public static function index () {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar () {

        // Almaacena la Cita y devuelve el ID'
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        // $respuesta = [
        //     'cita' => $cita
        // ];
        
        $idServicios = explode(",", $_POST['servicios']);
        
        // Almace la Cita y el Servicio
        foreach($idServicios as $idServicio){
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];

            $citaServicio = new CitaServicio($args);
            $respuesta = $citaServicio->guardar();
        }
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];

            if(filter_var($id, FILTER_VALIDATE_INT)){
                $cita = Cita::find($id);
            }

            if($cita){
                $cita->eliminar();
            }

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}