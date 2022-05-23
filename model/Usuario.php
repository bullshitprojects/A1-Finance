<?php
class Usuario
{
    private $id_usuario;
    private $nombre;
    private $fecha_nacimiento;
    private $telefono;
    private $correo;
    private $contra;
    private $url_foto;
    private $id_tipo_usuario;

    //Constructor

    //Modificadores de acceso
    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUrlFoto(): string
    {
        return $this->url_foto;
    }

    public function setUrlFoto(string $foto)
    {
        $this->url_foto = $foto;
    }

    public function getFechaNacimiento(): DateTime
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(DateTime $fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;
    }

    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setCorreo(string $correo)
    {
        $this->correo = $correo;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setContra(string $contra, int $option)
    {
        //=================================
        // 1 = ENCRYPT
        // ? = READ
        //=================================
        if ($option == 1) {
            //=================================
            // SET HASH ENCRYPTION FOR PASSWORDS
            //=================================
            $hash = password_hash($contra, PASSWORD_DEFAULT);
            $this->contra = $hash;
        } else {
            $this->contra = $contra;
        }
    }

    public function getContra(): string
    {
        return $this->contra;
    }

    public function getId_tipoUsuario(): int
    {
        return $this->id_tipo_usuario;
    }

    public function setId_tipoUsuario(int $id_tipoUsuario)
    {
        $this->id_tipo_usuario = $id_tipoUsuario;
    }
}
