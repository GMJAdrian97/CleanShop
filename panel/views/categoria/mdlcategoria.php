<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Categoria extends sistema{
                public $id_categoria;
                public $nombre_categoria;

                /* <!-- Geters & Seters  --> */
                public function getId_categoria(){
                    return $this->id_categoria;
                }

                public function setId_categoria($id_categoria){
                    $this->id_categoria = $id_categoria;
                    return $this;
                }
                public function getNombre_categoria(){
                    return $this->nombre_categoria;
                }

                public function setNombre_categoria($nombre_categoria){
                    $this->nombre_categoria = $nombre_categoria;
                    return $this;
                }    
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM categoria";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datoscategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datoscategorias; 
                        }

                        public function readOne($id_categoria){
                                $this->connect();
                                $sql = "SELECT c.nombre_categoria
                                        from categoria c
                                        WHERE c.id_categoria = :id_categoria;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);
                                $stmt->execute();
                                $datoscategoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datoscategoria = (isset($datoscategoria[0]))?$datoscategoria[0]:null;
                                return $datoscategoria;
                        }

                        public function create($datosFormulariocategoria){
                                $this->connect();
                                $sql = "INSERT INTO categoria (nombre_categoria) 
                                               VALUES        (:nombre_categoria);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_categoria', $datosFormulariocategoria['nombre_categoria'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormulariocategoriaUP, $id_categoria){
                                $this->connect();
                                    $sql = "UPDATE categoria SET nombre_categoria = :nombre_categoria
                                                WHERE id_categoria = :id_categoria;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_categoria', $datosFormulariocategoriaUP['nombre_categoria'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_categoria){
                                $this->connect();
                                $sql = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $categoria = new Categoria;
    
?>