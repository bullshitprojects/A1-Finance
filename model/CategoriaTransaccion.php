<?php
class CategoriaTransaccion
{
  private $id_categoriaTransaccion;
  private $nombre;
  private $id_tipoTransaccion;
  
  //Constructores
  public function __construct($id_categoriaTransaccion, $nombre, $id_tipoTransaccion)
  {
    $this->id_categoriaTransaccion = $id_categoriaTransaccion;
    $this->nombre = $nombre;
    $this->id_tipoTransaccion = $id_tipoTransaccion;
  }

  //Modificadores de acceso
  public function getId_categoriaTransaccion():int
  {
    return $this->id_categoriaTransaccion;
  }

  public function setId_categoriaTransaccion(int $id_categoriaTransaccion){
    $this->id_categoriaTransaccion = $id_categoriaTransaccion;      
  }
 
  public function getNombre():string
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre){
    $this->nombre = $nombre;      
  }

  public function getId_tipoTransaccion():int
  {
    return $this->id_tipoTransaccion;
  }

  public function setId_tipoTransaccion(int $id_tipoTransaccion){
    $this->id_tipoTransaccion = $id_tipoTransaccion;      
  }

}
?>