<?php
//Llamada al modelo
require_once("models/obras_model.php");
$all_obras = new obras_model();
$obras = $all_obras->get_obras();

//Llamada a la vista
require_once("views/obras_view.php");