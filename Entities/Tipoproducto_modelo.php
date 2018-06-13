<?php
include_once('Tipo_producto.php');
include_once('conexion.php');

class Tipoproducto_modelo
{
    private $conexion;

    public function __construct()
    {
        $this -> setConexion(new Conexion());
    }

    public function setConexion($conexion)
    {
        $this -> conexion = $conexion;}


    public function getConexion()
    {
        return $this -> conexion;
    }

    public function Registrar(Tipo_producto $tipo)
    {
        try
        {
			$sql = "INSERT INTO Tipo_producto(id_tipo_producto,descripcion) VALUES(?,?)";
			$this -> getConexion()->getPdo()->prepare($sql)->execute(
                array(
                    $tipo -> getId_tipo_producto(),
                    $tipo -> getDescripcion())
                );
			echo "Tipo de producto agreado exitosamente";
		}
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $resultado = array();
            $sql = "SELECT * FROM Tipo_producto";
            $stm = $this->getConexion()->getPDO()->prepare($sql);
            $stm -> execute();
            foreach($stm -> fetchALL(PDO::FETCH_OBJ)as $r)
            {
                $tipo = new Tipo_producto($r->id_tipo_producto, $r->descripcion);
                $resultado[]=$tipo;
            }
            return $resultado;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Buscar($id_tipo_producto)
    {
        try
        {
            $sql = "SELECT * FROM Tipo_producto WHERE id_tipo_producto = ?";
            $stm = $this->getConexion()->getPDO()->prepare($sql);
            $stm -> execute(array($id_tipo_producto));
            $r = $stm -> fetch(PDO::FETCH_OBJ);
            $tipo = new Tipo($r->id_tipo_producto, $r->descripcion);
            return $tipo;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_tipo_producto)
    {
        try
        {
            $sql = "DELETE FROM Tipo_producto WHERE id_tipo_producto = ?";
            $stm = $this->getConexion()->getPDO()->prepare($sql);
            $stm -> execute(array($id_tipo_producto));
            echo "Tipo de producto eliminado corrrectamente";
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Tipo_producto $tipo)
    {
        try
        {
            $sql = "UPDATE Tipo_producto SET descripcion = ? WHERE id_tipo_producto = ?";
            $stm = $this->getConexion()->getPDO()->prepare($sql);
            $stm -> execute(array($tipo->getDescripcion(),
                $tipo->getId_tipo_producto()));
			echo"Tipo producto actualizado exitosamente";
		}
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}