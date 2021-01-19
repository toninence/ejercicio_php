<?php

require_once("constantes.php");
$funcion = @$_GET['f'];
require_once("models/ventas_model.php");
require_once("models/obras_model.php");

$venta = new ventas_model();
$obra = new obras_model();
$cod_obra = $_GET['cod_obra'];

// chequeo disponibles y fecha de la obra
$hay_disponibles = $obra->get_disponibles($cod_obra) > 0 ? true: false;
$fecha_valida = $obra->fecha_obra($cod_obra) > date("Y-m-d") ? true: false;



if (!$funcion) {
    $obra_a_vender = $venta->get_obra_by_cod($_GET['cod_obra']);

    //Llamada a la vista
    require_once("views/ventas_view.php");
} else {
    echo realizar_venta($_GET['comprador'], $_GET['cod_obra']);
    // si existe una funcion en la url la invoco con los parametros    
    return;
}
// Funciones
// Realiza una nueva venta
function realizar_venta($comprador, $cod_obra)
{
    $venta = new ventas_model();
    $obras = new obras_model();

    $disponibles = $obras->get_disponibles($cod_obra);
    $fecha_obra = $obras->fecha_obra($cod_obra);
    // si la fecha ya paso envio un mensaje de error
    if ($fecha_obra < date("Y-m-d")) {
        return json_encode(['accion' => false, 'error' => "La fecha esta caducada"]);
    }
    // Chequeo que haya localidades disponibles
    else if ($disponibles) {
        if ($venta->realizar_venta($comprador, $cod_obra)) {
            $obras->descontar_disponibles($cod_obra);
            return json_encode(['accion' => true, 'ticket' => $venta->ultimo_ticket()]);
        }
    } else {
        return json_encode(['accion' => false, 'error' => "No hay entradas disponibles"]);
    }
}
