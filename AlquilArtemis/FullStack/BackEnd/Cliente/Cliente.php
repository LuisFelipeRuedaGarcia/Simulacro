<?php

class Cliente extends Conectar{
    private $IdCliente;
    private $Nombre;
    private $Correo;
    private $Telefono;

    public function __Construct($IdCliente=0, $Nombre=NULL, $Correo=NULL, $Telefono=NULL, $DbCnx=""){
        $this->IdCliente=$IdCliente;
        $this->Nombre=$Nombre;
        $this->Correo=$Correo;
        $this->Telefono=$Telefono;
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
            $stm=$this->DbCnx->prepare("SELECT * FROM Clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function FetchOne(){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Clientes WHERE IdCliente = ?");
            $stm->execute([$this->IdCliente]);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Insert(){
        try {
            $stm=$this->DbCnx->prepare("INSERT INTO Clientes(IdCliente, Nombre, Correo, Telefono) VALUES (?,?,?,?)");
            $stm->execute([$this->IdCliente, $this->Nombre, $this->Correo, $this->Telefono]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Update($OldId){
        try {
            $stm=$this->DbCnx->prepare("UPDATE Clientes SET IdCliente = ?, Nombre =?, Correo=?, Telefono=? WHERE IdCliente = ?");
            $stm->execute([$this->IdCliente, $this->Nombre, $this->Correo, $this->Telefono, $OldId]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function Delete(){
        $stm=$this->DbCnx->prepare("DELETE FROM Clientes WHERE IdCliente = ?");
        $stm->execute([$this->IdCliente]);
    }

}

/* $Cliente  = new Cliente();

$Cliente->IdCliente=1005107983;
$Cliente->Nombre="Ludwing";
$Cliente->Correo="lfxrg@gmail.com";
$Cliente->Telefono=3145768618;

echo $Cliente->IdCliente;
echo $Cliente->Nombre;
echo $Cliente->Correo;
echo $Cliente->Telefono; */

/* $Cliente->Insert(); */
/* $Cliente->Update(1005107983); */
/* $Cliente->Delete(); */
/* var_dump($Cliente->Fetch()); */
/* var_dump($Cliente->FetchOne(1)); */

?>