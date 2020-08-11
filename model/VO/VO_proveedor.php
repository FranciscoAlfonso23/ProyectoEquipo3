<?php

class VOProveedor{
    private $id;
    private $proveedor;
    private $correo;
    private $telefono;

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setTelelfono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTelelfono()
    {
        return $this->telefono;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}