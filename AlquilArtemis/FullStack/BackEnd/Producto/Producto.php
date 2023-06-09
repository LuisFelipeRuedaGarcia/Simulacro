<?php
require_once("../Config/Conectar.php");
class Producto Extends Conectar{
    private $IdProducto;
    Private $Nombre;
    public function __construct($IdProducto=0, $Nombre=NULL, $DbCnx="")
    {
        $this->Nombre = $Nombre;
        $this->IdProducto = $IdProducto;
        parent::__construct($DbCnx);
    }
    public function __get($Property)
    {
        if(property_exists($this, $Property)){
            return $this->$Property;
        }
    }
    public function __set($Property, $value)
    {
        if(property_exists($this, $Property))
        {
            $this->$Property=$value;
        }
    }
    public function Fetch(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Productos");
            $stm->execute();
            return $stm->FetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
};
$producto = new Producto();
$producto->Nombre = "Lu";
echo $producto->Nombre;
var_dump($producto->Fetch());
?>