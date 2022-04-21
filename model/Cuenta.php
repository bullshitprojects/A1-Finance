<?php
class Cuenta
{
  private $numeroCuenta;
  private $entidadFinanciera;
  private $nombre;
  private $saldoInicial;
  private $id_usuario;
  
  //Constructores
  public function __construct($numeroCuenta, $entidadFinanciera, $nombre, $saldoInicial, $id_usuario)
  {
    $this->numeroCuenta = $numeroCuenta;
    $this->entidadFinanciera = $entidadFinanciera;
    $this->nombre = $nombre;
    $this->saldoInicial = $saldoInicial;
    $this->id_usuario = $id_usuario;
  }

  //Modificadores de acceso
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