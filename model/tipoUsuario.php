<?php
class TipoUsuario
{
  private $id_tipoUsuario;
  private $descripción;
  
  
  //Constructores
  public function __construct($id_tipoUsuario, $descripción)
  {
    $this->id_tipoUsuario = $id_tipoUsuario;
    $this->descripción = $descripción;
  }

  //Modificadores de acceso
  public function getId_tipoUsuario():int
  {
    return $this->id_tipoUsuario;
  }

  public function setId_tipoUsuario(int $id_tipoUsuario){
    $this->id_tipoUsuario = $id_tipoUsuario;      
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