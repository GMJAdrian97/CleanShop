<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Calidad extends sistema{
                //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_calidad;
                public $descripcion_calidad;

                /* <!-- Geters & Seters  --> */
                public function getId_calidad(){
                    return $this->id_calidad;
                }

                public function setId_calidad($id_calidad){
                    $this->id_calidad = $id_calidad;
                    return $this;
                }
                public function getDescripcion_calidad(){
                    return $this->descripcion_calidad;
                }

                public function setDescripcion_calidad($descripcion_calidad){
                    $this->descripcion_calidad = $descripcion_calidad;
                    return $this;
                }    
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM calidad";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datoscalidads = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datoscalidads; 
                        }

                        public function readOne($id_calidad){
                                $this->connect();
                                $sql = "SELECT c.descripcion_calidad
                                        from calidad c
                                        WHERE c.id_calidad = :id_calidad;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_calidad', $id_calidad, PDO::PARAM_STR);
                                $stmt->execute();
                                $datoscalidad = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datoscalidad = (isset($datoscalidad[0]))?$datoscalidad[0]:null;
                                return $datoscalidad;
                        }

                        public function create($datosFormulariocalidad){
                                $this->connect();
                                $sql = "INSERT INTO calidad (descripcion_calidad) 
                                               VALUES        (:descripcion_calidad);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':descripcion_calidad', $datosFormulariocalidad['descripcion_calidad'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormulariocalidadUP, $id_calidad){
                                $this->connect();
                                    $sql = "UPDATE calidad SET descripcion_calidad = :descripcion_calidad
                                                WHERE id_calidad = :id_calidad;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':descripcion_calidad', $datosFormulariocalidadUP['descripcion_calidad'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_calidad', $id_calidad, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_calidad){
                                $this->connect();
                                $sql = "DELETE FROM calidad WHERE id_calidad = :id_calidad";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_calidad', $id_calidad, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $calidad = new Calidad;
    
?>