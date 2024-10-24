<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Municipio extends sistema{
             //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_municipio;
                public $nombre_municipio;

                /* <!-- Geters & Seters  --> */
                public function getId_municipio(){
                    return $this->id_municipio;
                }

                public function setId_municipio($id_municipio){
                    $this->id_municipio = $id_municipio;
                    return $this;
                }
                public function getNombre_municipio(){
                    return $this->nombre_municipio;
                }

                public function setNombre_municipio($nombre_municipio){
                    $this->nombre_municipio = $nombre_municipio;
                    return $this;
                }    
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM municipio";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datosmunicipios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datosmunicipios; 
                        }

                        public function readOne($id_municipio){
                                $this->connect();
                                $sql = "SELECT c.nombre_municipio
                                        from municipio c
                                        WHERE c.id_municipio = :id_municipio;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_municipio', $id_municipio, PDO::PARAM_STR);
                                $stmt->execute();
                                $datosmunicipio = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datosmunicipio = (isset($datosmunicipio[0]))?$datosmunicipio[0]:null;
                                return $datosmunicipio;
                        }

                        public function create($datosFormulariomunicipio){
                                $this->connect();
                                $sql = "INSERT INTO municipio (nombre_municipio) 
                                               VALUES        (:nombre_municipio);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_municipio', $datosFormulariomunicipio['nombre_municipio'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormulariomunicipioUP, $id_municipio){
                                $this->connect();
                                    $sql = "UPDATE municipio SET nombre_municipio = :nombre_municipio
                                                WHERE id_municipio = :id_municipio;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_municipio', $datosFormulariomunicipioUP['nombre_municipio'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_municipio', $id_municipio, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_municipio){
                                $this->connect();
                                $sql = "DELETE FROM municipio WHERE id_municipio = :id_municipio";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_municipio', $id_municipio, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $municipio = new Municipio;
    
?>