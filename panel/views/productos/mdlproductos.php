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
                    $sql = "SELECT * FROM `productos";
                    $stmt = $this->con->prepare($sql);
                    $stmt->execute();
                    $datosProductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $datosProductos; 
            }

            public function readOne($id_ciudad){
                    $this->connect();
                    $sql = "SELECT c.id_ciudad,
                                    c.nombre_ciudad,
                                    e.nombre_estado as estado
                            from ciudad c
                            inner join estado e on e.id_estado = c.id_estado
                            WHERE c.id_ciudad = :id_ciudad;";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_STR);
                    $stmt->execute();
                    $datosCiudad = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $datosCiudad = (isset($datosCiudad[0]))?$datosCiudad[0]:null;
                    return $datosCiudad;
            }

            public function create($datosFormularioCiudad){
                    $this->connect();
                    $sql = "INSERT INTO ciudad (nombre_ciudad,
                                                 id_estado) 
                                   VALUES        (:nombre_ciudad, 
                                                 :id_estado);"; 
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre_ciudad', $datosFormularioCiudad['nombre_ciudad'], PDO::PARAM_STR);
                    $stmt -> bindParam(':id_estado', $datosFormularioCiudad['estado'], PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();
            }

            public function update($datosFormularioCiudadUP, $id_ciudad){
                    $this->connect();
                        $sql = "UPDATE ciudad SET nombre_ciudad = :nombre_ciudad, 
                                                   id_estado = :id_estado
                                    WHERE id_ciudad = :id_ciudad;";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre_ciudad', $datosFormularioCiudadUP['nombre_ciudad'], PDO::PARAM_STR);
                    $stmt -> bindParam(':id_estado', $datosFormularioCiudadUP['estado'], PDO::PARAM_INT);
                    $stmt -> bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();
            }

            public function delete($id_ciudad){
                    $this->connect();
                    $sql = "DELETE FROM ciudad WHERE id_ciudad = :id_ciudad";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    return $stmt->rowCount();
            }

    /* Metodos CRUD */
}

$producto = new Productos;
?>