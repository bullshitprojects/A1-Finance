<?php
class TipoTransaccion
{
  private $id_tipoTransaccion;
  private $descripción;
  
  
  //Constructores
  public function __construct($id_tipoTransaccion, $descripción)
  {
    $this->id_tipoTransaccion = $id_tipoTransaccion;
    $this->descripción = $descripción;
  }

  //Modificadores de acceso
  public function getId_tipoTransaccion():int
  {
    return $this->id_tipoTransaccion;
  }

  public function setId_tipoTransaccion(int $id_tipoTransaccion){
    $this->id_tipoTransaccion = $id_tipoTransaccion;      
  }
 
  public function getDescripción():string
  {
    return $this->descripción;
  }

  public function setDescripción(string $descripción){
    $this->descripción = $descripción;      
  }
}
?>