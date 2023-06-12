<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

class Producto Extends Conectar{
    private $IdProducto;
    Private $Nombre;
    private $Precio;
    public function __construct($IdProducto=0, $Nombre=NULL, $Precio=NULL, $DbCnx="")
    {
        $this->Nombre = $Nombre;
        $this->IdProducto = $IdProducto;
        $this->Precio=$Precio;
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

    public function FetchOne(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Productos WHERE IdProducto= ?");
            $stm->execute([$this->IdProducto]);
            return $stm->FetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function Insert(){
        try {
            $stm = $this->DbCnx->prepare("INSERT INTO Productos(Nombre, Precio) VALUES (?,?)");
            $stm->execute([$this->Nombre, $this->Precio]);
        } catch (Exception $e) {
            $e->getMessage();
        }

    }

    public function Update(){
try {
    $stm=$this->DbCnx->prepare("UPDATE Productos SET Nombre = ?, Precio = ? WHERE IdProducto = ?");
    $stm->execute([$this->Nombre, $this->Precio, $this->IdProducto]);
} catch (Exception $e) {
    $e->getMessage();
}
    }
    public function Delete(){
try {
    $stm=$this->DbCnx->prepare("DELETE FROM Productos Where IdProducto= ?");
    $stm->execute([$this->IdProducto]);
} catch (Exception $e) {
    $e->getMessage();
}
    }
}
/* $producto = new Producto();
$producto->Nombre = "Luis5yy";
$producto->IdProducto =5;
echo $producto->Nombre;
echo $producto->IdProducto;
var_dump($producto->Fetch());
var_dump($producto->FetchOne()); */
/* $producto->Insert(); */
/* $producto->Update(); */
/* $producto->Delete(); */
?>