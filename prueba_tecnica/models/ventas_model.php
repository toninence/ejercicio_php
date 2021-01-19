<?php
class ventas_model
{
    private $db;
    private $obra;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        // $this->obra = array();
    }

    public function get_obra_by_cod($cod_obra)
    {
        $consulta = @$this->db->query("SELECT * FROM OBRA WHERE cod_obra = $cod_obra");
        if ($consulta) {
            $this->obra = $consulta->fetch_assoc();
        }

        return $this->obra;
    }
    // realiza una nueva venta. recibe comprador y codigo de obra
    public function realizar_venta($comprador, $cod_obra)
    {
        $consulta = $this->db->query("INSERT INTO ventas (cod_obra, comprador) VALUES ($cod_obra, '$comprador')");
        return $consulta;
    }
    public function ultimo_ticket(){
        $consulta = $this->db->query("SELECT MAX(numero_venta) AS id FROM ventas");
        $ultimo_ticket = $consulta->fetch_assoc();
        return $ultimo_ticket['id'];
    }
}
