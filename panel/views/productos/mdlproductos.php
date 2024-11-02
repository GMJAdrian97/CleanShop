<?php

require_once('../../sistema.php');

// Se crea la clase

class Productos extends sistema{

    // Se crean las variables por cada atributo de la tabla eceptuando las llasves foraneas

    public $id_producto;
    public $nombre_producto;
    public $img_producto;
    public $descripcion_producto;
    public $precio_adquisicion;
    public $precio_menudeo;
    public $precio_mayoreo;
    public $precio_vip;
    public $color_producto;
    public $tipo_producto;

    
    /* <!-- Geters & Seters  --> */

    public function getId_producto(){
        return $this->id_producto;
    }

    public function setId_producto($id_producto){
        $this->id_producto = $id_producto;
        return $this;
    }

    public function getNombre_producto(){
        return $this->nombre_producto;
    }

    public function setNombre_producto($nombre_producto){
        $this->nombre_producto = $nombre_producto;
        return $this;
    }

    public function getImg_producto(){
        return $this->img_producto;
    }
 
    public function setImg_producto($img_producto){
        $this->img_producto = $img_producto;
        return $this;
    }

    public function getDescripcion_producto(){
        return $this->descripcion_producto;
    }

    public function setDescripcion_producto($descripcion_producto){
        $this->descripcion_producto = $descripcion_producto;
        return $this;
    }

    public function getPrecio_adquisicion(){
        return $this->precio_adquisicion;
    }

    public function setPrecio_adquisicion($precio_adquisicion){
        $this->precio_adquisicion = $precio_adquisicion;
        return $this;
    }

    public function getPrecio_menudeo(){
        return $this->precio_menudeo;
    }

    public function setPrecio_menudeo($precio_menudeo){
        $this->precio_menudeo = $precio_menudeo;
        return $this;
    }

    public function getPrecio_mayoreo(){
        return $this->precio_mayoreo;
    }

    public function setPrecio_mayoreo($precio_mayoreo){
        $this->precio_mayoreo = $precio_mayoreo;
        return $this;
    }

    public function getPrecio_vip(){
        return $this->precio_vip;
    }
    public function setPrecio_vip($precio_vip){
        $this->precio_vip = $precio_vip;
        return $this;
    }
 
    public function getColor_producto(){
        return $this->color_producto;
    }
    public function setColor_producto($color_producto){
        $this->color_producto = $color_producto;
        return $this;
    }

    public function getTipo_producto(){
        return $this->tipo_producto;
    }
    public function setTipo_producto($tipo_producto){
        $this->tipo_producto = $tipo_producto;
        return $this;
    }

/* <!-- Geters & Seters  --> */


    /* <!-- Metodos CRUD --> */

            public function read(){
                    $this->connect();
                    $sql = "SELECT * FROM productos";
                    $stmt = $this->con->prepare($sql);
                    $stmt->execute();
                    $datosProductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $datosProductos; 
            }

            public function readOne($id_producto){
                    $this->connect();
                    $sql = "SELECT p.id_producto,
                                    p.nombre_producto,
                                    p.img_producto,
                                    p.descripcion_producto,
                                    p.precio_adquisicion,
                                    p.precio_menudeo,
                                    p.precio_mayoreo,
                                    p.precio_vip,
                                    p.color_producto,
                                    p.tipo_producto,
                                    c.nombre_categoria AS categoria,
                                    m.nombre_marca AS marca,
                                    prov.nombre_proveedor AS proveedor,
                                    s.nombre_sucursal As sucursal
                                FROM productos p
                                JOIN categoria c ON p.id_categoria = c.id_categoria
                                JOIN marcas m ON p.id_marca = m.id_marca
                                JOIN proveedores prov ON p.id_proveedor = prov.id_proveedor
                                JOIN sucursal s ON p.id_sucursal = s.id_sucursal
                                WHERE p.id_producto = :id_producto;";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                    $stmt->execute();
                    $datosProductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $datosProductos = (isset($datosProductos[0]))?$datosProductos[0]:null;
                    return $datosProductos;
            }

            public function create($datosFormularioProducto){
                    $this->connect();
                    $sql = "INSERT INTO productos (nombre_producto, 
                                                    img_producto, 
                                                    descripcion_producto, 
                                                    precio_adquisicion, 
                                                    precio_menudeo, 
                                                    precio_mayoreo, 
                                                    precio_vip, 
                                                    color_producto, 
                                                    tipo_producto, 
                                                    id_categoria, 
                                                    id_marca, 
                                                    id_proveedor, 
                                                    id_sucursal) 
                                   VALUES        (:nombre_producto, 
                                                    :img_producto, 
                                                    :descripcion_producto, 
                                                    :precio_adquisicion, 
                                                    :precio_menudeo, 
                                                    :precio_mayoreo, 
                                                    :precio_vip, 
                                                    :color_producto, 
                                                    :tipo_producto, 
                                                    :id_categoria, 
                                                    :id_marca, 
                                                    :id_proveedor, 
                                                    :id_sucursal);"; 
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre_producto', $datosFormularioProducto['nombre_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':img_producto', $datosFormularioProducto['img_producto'], PDO::PARAM_INT);
                    $stmt -> bindParam(':descripcion_producto', $datosFormularioProducto['descripcion_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_adquisicion', $datosFormularioProducto['precio_adquisicion'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_menudeo', $datosFormularioProducto['precio_menudeo'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_mayoreo', $datosFormularioProducto['precio_mayoreo'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_vip', $datosFormularioProducto['precio_vip'], PDO::PARAM_STR);
                    $stmt -> bindParam(':color_producto', $datosFormularioProducto['color_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':tipo_producto', $datosFormularioProducto['tipo_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':id_categoria', $datosFormularioProducto['id_categoria'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_marca', $datosFormularioProducto['id_marca'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_proveedor', $datosFormularioProducto['id_proveedor'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_sucursal', $datosFormularioProducto['id_sucursal'], PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();
            }

            public function update($datosFormularioProductoUP, $id_producto){
                    $this->connect();
                        $sql = "UPDATE productos
                                SET 
                                    nombre_producto = :nombre_producto,
                                    img_producto = :img_producto,
                                    descripcion_producto = :descripcion_producto,
                                    precio_adquisicion = :precio_adquisicion,
                                    precio_menudeo = :precio_menudeo,
                                    precio_mayoreo = :precio_mayoreo,
                                    precio_vip = :precio_vip,
                                    color_producto = :color_producto,
                                    tipo_producto = :tipo_producto,
                                    id_categoria = :id_categoria,
                                    id_marca = :id_marca,
                                    id_proveedor = :id_proveedor,
                                    id_sucursal = :id_sucursal
                                WHERE id_producto = :id_producto;";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre_producto', $datosFormularioProductoUP['nombre_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':img_producto', $datosFormularioProductoUP['img_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':descripcion_producto', $datosFormularioProductoUP['descripcion_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_adquisicion', $datosFormularioProductoUP['precio_adquisicion'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_menudeo', $datosFormularioProductoUP['precio_menudeo'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_mayoreo', $datosFormularioProductoUP['precio_mayoreo'], PDO::PARAM_STR);
                    $stmt -> bindParam(':precio_vip', $datosFormularioProductoUP['precio_vip'], PDO::PARAM_STR);
                    $stmt -> bindParam(':color_producto', $datosFormularioProductoUP['color_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':tipo_producto', $datosFormularioProductoUP['tipo_producto'], PDO::PARAM_STR);
                    $stmt -> bindParam(':id_categoria', $datosFormularioProductoUP['id_categoria'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_marca', $datosFormularioProductoUP['id_marca'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_proveedor', $datosFormularioProductoUP['id_proveedor'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_sucursal', $datosFormularioProductoUP['id_sucursal'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();
            }

            public function delete($id_producto){
                    $this->connect();
                    $sql = "DELETE FROM productos WHERE id_producto = :id_producto";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    return $stmt->rowCount();
            }

    /* Metodos CRUD */
}

$producto = new Productos;
?>