<?php

class Cotizacion extends Conectar{
    private $IdCotizacion;
    private $IdEmpleado;
    private $IdProducto;
    private $IdCliente;
    private $Fecha;
    private $Hora;
    private $DuracionDias;
    private $PrecioPorDia;
    private $TotalPesos;

    public function __Construct($IdCotizacion=0, $IdEmpleado=NULL, $IdProducto=NULL, $IdCliente=NULL, $Fecha=NULL,   $Hora=NULL,   $DuracionDias=NULL,   $PrecioPorDia=NULL,   $TotalPesos=NULL, $DbCnx=""){
        $this->IdCotizacion=$IdCotizacion;
        $this->IdEmpleado=$IdEmpleado;
        $this->IdProducto=$IdProducto;
        $this->IdCliente=$IdCliente;
        $this->Fecha=$Fecha;
        $this->Hora=$Hora;
        $this->DuracionDias=$DuracionDias;
        $this->PrecioPorDia=$PrecioPorDia;
        $this->TotalPesos=$TotalPesos;
        parent::__Construct($DbCnx);
    }

    public function __get($Property)
    {
        if(property_exists($this,$Property)){
            return $this->$Property;
        }
    }

    public function __set($Property, $value)
    {
        if(property_exists($this,$Property)){
            $this->$Property=$value;
        }
    }

    public function Fetch(){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Cotizaciones");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne(){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Cotizaciones WHERE IdCotizacion = ?");
            $stm->execute([$this->IdCotizacion]);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert(){
        try {
            $stm=$this->DbCnx->prepare("INSERT INTO Cotizaciones(IdCotizacion, IdEmpleado, IdProducto, IdCliente, Fecha, Hora, DuracionDias, PrecioPorDia, TotalPesos) VALUES (?,?,?,?,?,?,?,?,?)");
            $stm->execute([$this->IdCotizacion, $this->IdEmpleado, $this->IdProducto, 
            $this->IdCliente,
            $this->Fecha, 
            $this->Hora, 
            $this->DuracionDias, 
            $this->PrecioPorDia, 
            $this->TotalPesos]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Update($OldId){
        try {
            $stm=$this->DbCnx->prepare("UPDATE Cotizaciones SET IdCotizacion = ?, IdEmpleado =?, IdProducto=?, IdCliente=?, Fecha=?, Hora=?, DuracionDias=?, PrecioPorDia=?, TotalPesos=? WHERE IdCotizacion = ?");
            $stm->execute([$this->IdCotizacion, 
            $this->IdEmpleado, 
            $this->IdProducto, 
            $this->IdCliente,
            $this->Fecha, 
            $this->Hora, 
            $this->DuracionDias, 
            $this->PrecioPorDia, 
            $this->TotalPesos,
            $OldId]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Delete(){
        $stm=$this->DbCnx->prepare("DELETE FROM Cotizaciones WHERE IdCotizacion = ?");
        $stm->execute([$this->IdCotizacion]);
    }

}

/* $Cotizacion  = new Cotizacion();

$Cotizacion->IdCotizacion=1005107983;
$Cotizacion->IdEmpleado="Ludwing";
$Cotizacion->IdProducto="lfxrg@gmail.com";
$Cotizacion->IdCliente=3145768618;

echo $Cotizacion->IdCotizacion;
echo $Cotizacion->IdEmpleado;
echo $Cotizacion->IdProducto;
echo $Cotizacion->IdCliente; */

/* $Cotizacion->Insert(); */
/* $Cotizacion->Update(1005107983); */
/* $Cotizacion->Delete(); */
/* var_dump($Cotizacion->Fetch()); */
/* var_dump($Cotizacion->FetchOne(1)); */

?>