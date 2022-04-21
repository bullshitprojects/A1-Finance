<?php
class Usuario
{
  private $id_usuario;
  private $nombre;
  private $dui;
  private $foto;
  private $fechaNacimiento;
  private $telefono;
  private $correo;
  private $contra;
  private $id_tipoUsuario;
  
  //Constructores
  public function __construct($id_usuario, $nombre, $dui, $foto, $fechaNacimiento, $telefono, $correo, $contra ,$id_tipoUsuario)
  {
    $this->id_usuario = $id_usuario;
    $this->nombre = $nombre;
    $this->dui = $dui;
    $this->foto = $foto;
    $this->fechaNacimiento = $fechaNacimiento;
    $this->telefono = $telefono;
    $this->correo = $correo;
    $this->contra = $contra;
    $this->id_tipoUsuario = $id_tipoUsuario;
  }

  //Modificadores de acceso
  public function getIdUsuario():int
  {
    return $this->id_usuario;
  }

  public function setIdUsuario(int $id_usuario){
    $this->id_usuario = $id_usuario;      
  }
 
  public function getNombre():string
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre){
    $this->nombre = $nombre;      
  }

  public function getDui():string
  {
    return $this->dui;
  }

  public function setDui(string $dui){
    $this->dui = $dui;      
  }
  
  public function getFoto():string
  {
    return $this->foto;
  }

  public function setFoto(string $foto){
    $this->foto = $foto;      
  }

  public function getFechaNacimiento():DateTime
  {
    return $this->fechaNacimiento;
  }

  public function setFechaNacimiento(DateTime $fechaNacimiento){
    $this->fechaNacimiento = $fechaNacimiento;      
  }

  public function setTelefono(string $telefono){
    $this->telefono = $telefono;      
  }
  
  public function getTelefono():string
  {
    return $this->telefono;
  }

  public function setCorreo(string $correo){
    $this->correo = $correo;      
  }
  
  public function getCorreo():string
  {
    return $this->correo;
  }

  public function setContra(string $contra){
    $this->contra = $contra;      
  }
  
  public function getContra():string
  {
    return $this->contra;
  }

  public function getId_tipoUsuario():int
  {
    return $this->id_tipoUsuario;
  }

  public function setId_tipoUsuario(int $id_tipoUsuario){
    $this->id_tipoUsuario = $id_tipoUsuario;      
  }
}
