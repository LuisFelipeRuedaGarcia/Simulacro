<?php 
/* ini_set("display_errors",1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL); */
class Empleado{
    private $IdEmpleado;
    private $Username;
    private $Password;
    protected $DbCnx;
    public function __construct($IdEmpleado=0, $Username=NULL, $Password=NULL){
        $this->IdEmpleado=$IdEmpleado;
        $this->Username=$Username;
        $this->Password=$Password;
        $this->DbCnx= new PDO("mysql:host=localhost;dbname=AlquilArtemis", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
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
            $stm->execute([$this->IdEmpleado,$this->Username,md5($this->Password)]);
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
            $stm->execute([$this->Username, $this->Password, $this->IdEmpleado, $OldId]);
        } catch (Exception $e) {
            $e->getMessage();
        }

    }

}
$Empleado = new Empleado();
$Empleado->IdEmpleado = 122;
$Empleado->Username = "Ludwing";
$Empleado->Password = "123";
echo $Empleado->Username;
echo $Empleado->Password; 
  var_dump($Empleado->Fetch());
 echo "<br>";
 var_dump($Empleado->FetchOne());
/* $Empleado->Insert(); */
/* $Empleado->Delete(); */
$Empleado->Update($Empleado->IdEmpleado);

?>
