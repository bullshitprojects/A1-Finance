<?php
class Transaccion
{
  private $id_transaccion;
  private $fecha;
  private $descripcion;
  private $monto;
  private $numeroCuenta;
  private $id_usuario;
  private $id_categoria;
  
  //Constructores
  public function __construct($id_transaccion, $fecha, $descripcion, $monto, $numeroCuenta, $id_usuario, $id_categoria)
  {
    $this->id_transaccion = $id_transaccion;
    $this->fecha = $fecha;
    $this->descripcion = $descripcion;
    $this->monto = $monto;
    $this->numeroCuenta = $numeroCuenta;
    $this->id_usuario = $id_usuario;
    $this->id_categoria = $id_categoria;
  }

  //Modificadores de acceso
  public function getId_transaccion():int
  {
    return $this->id_transaccion;
  }

  public function setId_transaccion(int $id_transaccion){
    $this->id_transaccion = $id_transaccion;      
  }

  //falta poner dato
  public function getFecha()
  {
    return $this->fecha;
  }

  public function setFecha(string $fecha){
    $this->fecha = $fecha;      
  }

  public function getDescripcion():string
  {
    return $this->descripcion;
  }

  public function setDescripcion(string $descripcion){
    $this->descripcion = $descripcion;      
  }
  
  public function getMonto():float
  {
    return $this->monto;
  }

  public function setMonto(float $monto){
    $this->fotmontoo = $monto;      
  }

  public function getNumeroCuenta():string
  {
    return $this->numeroCuenta;
  }

  public function setNumeroCuenta(string $numeroCuenta){
    $this->numeroCuenta = $numeroCuenta;      
  }

  public function getId_usuario():int
  {
    return $this->id_usuario;
  }

  public function setId_usuario(int $id_usuario){
    $this->id_usuario = $id_usuario;      
  }

  public function getId_categoria():int
  {
    return $this->id_categoria;
  }

  public function setId_categoriao(int $id_categoria){
    $this->id_categoria = $id_categoria;      
  }

}
?>