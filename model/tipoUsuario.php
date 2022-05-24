<?php
class TipoUsuario
{
    private $id_tipo_usuario;
    private $descripcion;

    //Modificadores de acceso
    public function getId_tipo_usuario(): int
    {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario(int $id_tipo_usuario)
    {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
