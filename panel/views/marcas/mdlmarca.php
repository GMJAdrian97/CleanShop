<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Marca extends sistema{
                //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_marca;
                public $nombre_marca;

                /* <!-- Geters & Seters  --> */
                public function getId_marca(){
                    return $this->id_marca;
                }

                public function setId_marca($id_marca){
                    $this->id_marca = $id_marca;
                    return $this;
                }
                public function getNombre_marca(){
                    return $this->nombre_marca;
                }

                public function setNombre_marca($nombre_marca){
                    $this->nombre_marca = $nombre_marca;
                    return $this;
                }    
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM marcas";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datosmarcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datosmarcas; 
                        }

                        public function readOne($id_marca){
                                $this->connect();
                                $sql = "SELECT m.nombre_marca
                                        from marcas m
                                        WHERE m.id_marca = :id_marca;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_marca', $id_marca, PDO::PARAM_STR);
                                $stmt->execute();
                                $datosmarca = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datosmarca = (isset($datosmarca[0]))?$datosmarca[0]:null;
                                return $datosmarca;
                        }

                        public function create($datosFormulariomarca){
                                $this->connect();
                                $sql = "INSERT INTO marcas (nombre_marca) 
                                               VALUES        (:nombre_marca);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_marca', $datosFormulariomarca['nombre_marca'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormulariomarcaUP, $id_marca){
                                $this->connect();
                                    $sql = "UPDATE marcas SET nombre_marca = :nombre_marca
                                                WHERE id_marca = :id_marca;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_marca', $datosFormulariomarcaUP['nombre_marca'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_marca', $id_marca, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_marca){
                                $this->connect();
                                $sql = "DELETE FROM marcas WHERE id_marca = :id_marca";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_marca', $id_marca, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $marca = new Marca;
    
?>