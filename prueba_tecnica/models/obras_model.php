<?php
class obras_model
{
    private $db;
    private $obras;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->obras = array();
    }
    // Trae todas las obras y le agrego si tiene entradas disponibles y si la fecha no pasó
    public function get_obras()
    {
        $consulta = $this->db->query("SELECT * FROM obra ORDER BY fecha_obra DESC");
        if ($consulta) {
            while ($filas = $consulta->fetch_assoc()) {
                $this->obras[] = $filas;
                $this->obras[count($this->obras)-1]['entradas_disponibles'] = $filas['disponibles'] > 0 ? true : false;
                $this->obras[count($this->obras)-1]['fecha_disponible'] = $filas['fecha_obra'] >= date("Y-m-d") ? true : false;
            }
        }

        return $this->obras;
    }
    
    // Obtiene las localidades disponibles
    public function get_disponibles($cod_obra){
        $disponibles = $this->db->query("SELECT disponibles FROM obra WHERE cod_obra = $cod_obra");
        $disponibles = $disponibles->fetch_assoc();
        return $disponibles['disponibles'];
    }

    // Devuelve la fecha de la obra según el código
    public function fecha_obra($cod_obra){
        $fecha = $this->db->query("SELECT fecha_obra FROM obra WHERE cod_obra = $cod_obra");
        $fecha = $fecha->fetch_assoc();
        return $fecha['fecha_obra'];
        
    }

    // Descuenta un disponible con cada venta
    public function descontar_disponibles($cod_obra) {        
        $disponibles = $this->get_disponibles($cod_obra) - 1;
        $consulta = $this->db->query("UPDATE obra SET disponibles= $disponibles WHERE cod_obra = $cod_obra");
        return $consulta;
    }
}
