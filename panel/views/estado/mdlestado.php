<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Estado extends sistema{
                //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_estado;
                public $nombre_estado;

                /* <!-- Geters & Seters  --> */
                public function getId_estado(){
                    return $this->id_estado;
                }

                public function setId_estado($id_estado){
                    $this->id_estado = $id_estado;
                    return $this;
                }
                public function getNombre_estado(){
                    return $this->nombre_estado;
                }

                public function setNombre_estado($nombre_estado){
                    $this->nombre_estado = $nombre_estado;
                    return $this;
                }    
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM estado";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datosestados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datosestados; 
                        }

                        public function readOne($id_estado){
                                $this->connect();
                                $sql = "SELECT c.nombre_estado
                                        from estado c
                                        WHERE c.id_estado = :id_estado;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_estado', $id_estado, PDO::PARAM_STR);
                                $stmt->execute();
                                $datosestado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datosestado = (isset($datosestado[0]))?$datosestado[0]:null;
                                return $datosestado;
                        }

                        public function create($datosFormularioestado){
                                $this->connect();
                                $sql = "INSERT INTO estado (nombre_estado) 
                                               VALUES        (:nombre_estado);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_estado', $datosFormularioestado['nombre_estado'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormularioestadoUP, $id_estado){
                                $this->connect();
                                    $sql = "UPDATE estado SET nombre_estado = :nombre_estado
                                                WHERE id_estado = :id_estado;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_estado', $datosFormularioestadoUP['nombre_estado'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_estado', $id_estado, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_estado){
                                $this->connect();
                                $sql = "DELETE FROM estado WHERE id_estado = :id_estado";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_estado', $id_estado, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $estado = new Estado;
    
?>