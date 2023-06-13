<?php
if($_GET["op"]/* =="GetAll" */){
    require_once("../Config/Conectar.php");
}
class Empleado extends Conectar{
    private $IdEmpleado;
    private $Username;
    private $Password;
    protected $DbCnx;
    public function __construct($IdEmpleado=0, $Username=NULL, $Password=NULL, $DbCnx="")
    {
        $this->IdEmpleado=$IdEmpleado;
        $this->Username=$Username;
        $this->Password=$Password;
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
        if(property_exists($this,$Property)){
            $this->$Property=$value;
        }
    }

    public function Fetch(){
try {
    $stm=$this->DbCnx->prepare("SELECT * FROM Empleados");
    $stm->execute();
    return $stm->fetchAll();
} catch (PDOException $e) {
    return $e->getMessage();
}
    }

    public function FetchOne(){
        try {
        $stm=$this->DbCnx->prepare("SELECT * FROM Empleados WHERE IdEmpleado = ?");
        $stm->execute([$this->IdEmpleado]);
        return $stm->fetchAll();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function Insert(){
        try {
            $stm=$this->DbCnx->prepare("INSERT INTO Empleados(IdEmpleado, Username, Password) VALUES (?,?,?)");
            $stm->execute([$this->IdEmpleado,$this->Username, md5($this->Password)]);
            $this->Login();
            
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function Delete(){
        try {
            $stm=$this->DbCnx->prepare("DELETE FROM Empleados WHERE IdEmpleado=?");
            $stm->execute([$this->IdEmpleado]);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function Update($OldId){
        try {
            $stm=$this->DbCnx->prepare("UPDATE Empleados SET Username=?, Password=?, IdEmpleado= ? WHERE IdEmpleado= ?");
            $stm->execute([$this->Username, md5($this->Password), $this->IdEmpleado, $OldId]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function duplicar($p){
        return($p*2);
    }
    public function operacion(){
        return $this->duplicar($this->IdEmpleado);
    }
    public function CheckUsername(){
        try {
            $stm=$this->DbCnx->Prepare("SELECT * FROM Empleados WHERE Username = ?");
            $stm->execute([$this->Username]);
            return $stm->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function Login(){
        $stm=$this->DbCnx->prepare("SELECT * FROM Empleados WHERE Username = ? AND Password= ?");
        $stm->execute([$this->Username, md5($this->Password)]);
        $Array=$stm->FetchAll();
        if($Array){
            session_start();
            $_SESSION["IdEmpleado"]=$Array[0]["IdEmpleado"];
            $_SESSION["Username"]=$this->Username;
            session_start();
            $_SESSION["Password"]=$this->Password;
            return true;
        }else {
            return false;
        }

    }
}
/* $Empleado = new Empleado();
$Empleado->IdEmpleado = 321;
$Empleado->Username = "Ludwing";
$Empleado->Password = "123";
echo $Empleado->operacion(); */
/* echo $Empleado->Username;
echo $Empleado->Password; 
  var_dump($Empleado->Fetch());
 echo "<br>";
 var_dump($Empleado->FetchOne()); */
/* $Empleado->Insert(); */
/* $Empleado->Delete(); */
/* $Empleado->Update($Empleado->IdEmpleado); */

if($_GET["op"]/* =="GetAll" */){
    $Empleado = new Empleado();
    $Array = $Empleado->Fetch();
    echo json_encode($Array);
}
?>
