<!-- Seccion Dasboard -->
<section class="page-content">
    <!-- Seccion de saludo a admin -->
    <section class="section-user">
        <div class="admin-profile">
            <span class="greeting">Hola Administrador</span>
            <div class="notifications">
                <span class="badge">1</span>
                <svg>
                    <use xlink:href="#users"></use>
                </svg>
            </div>
        </div>
    </section>
    <!-- Seccion Principal Dasboard -->
    <section class="home">
        <div style="padding: 2rem;">
            <!-- Contenedror del formulario -->
            <div class="formulario-contenedor">
                <!-- Encabezado del formulario -->
                <h2><?php echo(isset($id_sucursal))? "MODIFICA TU ": "AÑADE UNA NUEVA ";?>SUCURSAL</h2>
                <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlsucursal.php?accion=<?php echo(isset($id_sucursal))? "update&id_sucursal=".$id_sucursal: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <!-- Declaramos el primer renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Nombre de la sucursal</label>
                                <input type="text" id="nombre" name="nombre_sucursal" placeholder="Ejem; Sucursal Alpha"
                                    required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$"
                                    value="<?php echo(isset($id_sucursal)) ? $datossucursal['nombre_sucursal']:"";?>">
                            </div>
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="direccion">Direccion de la sucursal</label>
                                <input type="text" id="direccion" name="direccion_sucursal" placeholder="Ejem; 1ra de Mayo #130"
                                    required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s#]+$"
                                    value="<?php echo(isset($id_sucursal)) ? $datossucursal['direccion_sucursal']:"";?>">
                            </div>
                        </div> <!-- Termino del primer renglon del formulario -->
                        <!-- Declaramos el segundo renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="telefono">Telefono de la sucursal</label>
                                <input type="text" id="telefono" name="telefono_sucursal" placeholder="Ejem; 4171206754"
                                    required pattern="^[0-9]+$"
                                    value="<?php echo(isset($id_sucursal)) ? $datossucursal['telefono_sucursal']:"";?>">
                            </div>
                            <!-- Declaramos la SEGUNDO coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="id_munucipio">Municipio de la sucursal</label>
                                <select class="form-select" aria-label="Default select example" name="id_municipio">
                                    <option selected>Municipio...</option>
                                    <?php foreach ($datosmunicipios as $key => $municipio): 
                                    $selected = "";
                                      if($municipio['nombre_municipio'] == $datossucursal['municipio']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $municipio['id_municipio'];?>"
                                        <?php echo $selected; ?>>
                                        <?php echo $municipio['nombre_municipio']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> <!-- Termino del segundo renglon del formulario -->
                    </div>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</section>