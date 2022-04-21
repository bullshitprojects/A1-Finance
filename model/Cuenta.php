<?php
class Cuenta
{
  private $id_cuenta;
  private $numeroCuenta;
  private $entidadFinanciera;
  private $nombre;
  private $saldoInicial;
  private $id_usuario;
  
  //Constructores
  public function __construct($id_cuenta, $numeroCuenta, $entidadFinanciera, $nombre, $saldoInicial, $id_usuario)
  {
    $this->id_cuenta = $id_cuenta;
    $this->numeroCuenta = $numeroCuenta;
    $this->entidadFinanciera = $entidadFinanciera;
    $this->nombre = $nombre;
    $this->saldoInicial = $saldoInicial;
    $this->id_usuario = $id_usuario;
  }

  //Modificadores de acceso
  public function getId_cuenta():string
  {
    return $this->id_cuenta;
  }

  public function setId_cuenta(string $id_cuenta){
    $this->id_cuenta = $id_cuenta;      
  }

  public function getNumeroCuenta():string
  {
    return $this->numeroCuenta;
  }

  public function setNumeroCuenta(string $numeroCuenta){
    $this->numeroCuenta = $numeroCuenta;      
  }
 
  public function getEntidadFinanciera():string
  {
    return $this->entidadFinanciera;
  }

  public function setEntidadFinanciera(string $entidadFinanciera){
    $this->entidadFinanciera = $entidadFinanciera;      
  }

  public function getNombre():string
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre){
    $this->nombre = $nombre;      
  }
  
  public function getSaldoInicial():float
  {
    return $this->saldoInicial;
  }

  public function setSaldoInicial(float $saldoInicial){
    $this->saldoInicial = $saldoInicial;      
  }

  public function setId_usuario(int $id_usuario){
    $this->id_usuario = $id_usuario;      
  }
  
  public function getId_usuario():int
  {
    return $this->id_usuario;
  }


}
?>