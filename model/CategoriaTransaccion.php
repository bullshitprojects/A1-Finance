<?php
class CategoriaTransaccion
{
    private $id_categoria_transaccion;
    private $nombre;
    private $id_tipo_transaccion;

    //Modificadores de acceso
    public function getId_categoria_transaccion(): int
    {
        return $this->id_categoria_transaccion;
    }

    public function setId_categoria_transaccion(int $id_categoria_transaccion)
    {
        $this->id_categoria_transaccion = $id_categoria_transaccion;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getId_tipo_transaccion(): int
    {
        return $this->id_tipo_transaccion;
    }

    public function setId_tipo_transaccion(int $id_tipo_transaccion)
    {
        $this->id_tipo_transaccion = $id_tipo_transaccion;
    }
}
