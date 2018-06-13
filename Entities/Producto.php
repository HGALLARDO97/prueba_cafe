<?php
/**
 * Created by PhpStorm.
 * User: VGtec
 * Date: 11-06-2018
 * Time: 19:14
 */

class Producto
{
    private $id_producto;
    private $nombre;
    private $imagen;
    private $cantidad;
    private $valor;
    private $id_tipo_producto;

    public function __construct($id_producto, $nombre, $imagen, $cantidad, $valor, $id_tipo_producto)
    {
        $this->id_producto=$id_producto;
        $this->nombre=$nombre;
        $this->imagen=$imagen;
        $this->cantidad=$cantidad;
        $this->valor=$valor;
        $this->id_tipo_producto=$id_tipo_producto;
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getImagen()
{
    return $this->imagen;
}

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }


    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getId_tipo_producto()
    {
        return $this->id_tipo_producto;
    }

    public function setId_tipo_producto($id_tipo_producto)
    {
        $this->id_tipo_producto = $id_tipo_producto;
    }

}

?>
