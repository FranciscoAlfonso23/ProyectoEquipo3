<?php

class VOProducto{
    private $id;
    private $nombre;
    private $precioU;
    private $existencia;
    private $precioV;
    private $marca;
    private $proveedor;


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setPrecioU($precioU)
    {
        $this->precioU = $precioU;
    }

    public function getPrecioU()
    {
        return $this->precioU;
    }

    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;
    }

    public function getExistencia()
    {
        return $this->existencia;
    }

    public function setPrecioV($precioV)
    {
        $this->precioV = $precioV;
    }

    public function getPrecioV()
    {
        return $this->precioV;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }
}