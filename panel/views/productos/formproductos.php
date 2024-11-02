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
                <h2><?php echo(isset($id_producto))? "MODIFICA TU ": "AÑADE UN NUEVO ";?>PRODUCTO</h2>
                <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlproductos.php?accion=<?php echo(isset($id_producto))? "update&id_producto=".$id_producto: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <!-- Declaramos el primer renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col">
                                <label for="nombre">Nombre del producto</label>
                                <input type="text" id="nombre" name="nombre_producto" placeholder="Ejem; Jabon ACE"
                                    required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['nombre_producto']:"";?>">
                            </div>
                        </div> <!-- Termino del primer renglon del formulario -->
                        <!-- Declaramos el primer renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Imagen del producto</label>
                                <input type="text" id="nombre" name="img_producto" placeholder="Ejem; Jabon ACE"
                                    required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['img_producto']:"";?>">
                            </div>
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="descripcion">Descripcion del productos</label>
                                <input type="text" id="descripcion" name="descripcion_producto"
                                    placeholder="Ejem; Bolsa de Jabon de 240 gramos" required
                                    pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s#]+$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['descripcion_producto']:"";?>">
                            </div>
                        </div> <!-- Termino del primer renglon del formulario -->
                        <!-- Declaramos el primer renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Precio Adquisicion</label>
                                <input type="text" id="nombre" name="precio_adquisicion" placeholder="Ejem; $10.23"
                                    required pattern="^\d+(\.\d+)?$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['precio_adquisicion']:"";?>">
                            </div>
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Precio Menudeo</label>
                                    <input type="text" id="nombre" name="precio_menudeo" placeholder="Ejem; $15.00"
                                        required pattern="^\d+(\.\d+)?$"
                                        value="<?php echo(isset($id_producto)) ? $datosProductos['precio_menudeo']:"";?>">
                            </div>
                        </div> <!-- Termino del primer renglon del formulario -->
                        <!-- Declaramos el primer renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Precio Mayoreo</label>
                                <input type="text" id="nombre" name="precio_mayoreo" placeholder="Ejem; $13.50"
                                    required pattern="^\d+(\.\d+)?$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['precio_mayoreo']:"";?>">
                            </div>
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Precio Vip</label>
                                <input type="text" id="nombre" name="precio_vip" placeholder="Ejem; $11.00" required
                                    pattern="^\d+(\.\d+)?$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['precio_vip']:"";?>">
                            </div>
                        </div> <!-- Termino del primer renglon del formulario -->
                        <!-- Declaramos el primer renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="nombre">Color del producto</label>
                                <input type="text" id="nombre" name="color_producto" placeholder="Ejem; Bolsa color azul"
                                    required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['color_producto']:"";?>">
                            </div>
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="direccion">Tipo de producto</label>
                                <input type="text" id="direccion" name="tipo_producto"
                                    placeholder="Ejem; PZ, Litros, Gramos, etc" required
                                    pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s#]+$"
                                    value="<?php echo(isset($id_producto)) ? $datosProductos['tipo_producto']:"";?>">
                            </div>
                        </div> <!-- Termino del primer renglon del formulario -->
                        <!-- Declaramos el segundo renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="id_munucipio">Categoria del producto</label>
                                <select class="form-select" aria-label="Default select example" name="id_categoria">
                                    <option selected>Categoria...</option>
                                    <?php foreach ($datosCategorias as $key => $categoria): 
                                    $selected = "";
                                      if($categoria['nombre_categoria'] == $datosProductos['categoria']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $categoria['id_categoria'];?>" <?php echo $selected; ?>>
                                        <?php echo $categoria['nombre_categoria']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- Declaramos la SEGUNDO coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="id_munucipio">Marca del producto</label>
                                <select class="form-select" aria-label="Default select example" name="id_marca">
                                    <option selected>Marca...</option>
                                    <?php foreach ($datosMarcas as $key => $marca): 
                                    $selected = "";
                                      if($marca['nombre_marca'] == $datosProductos['marca']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $marca['id_marca'];?>" <?php echo $selected; ?>>
                                        <?php echo $marca['nombre_marca']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> <!-- Termino del segundo renglon del formulario -->
                        <!-- Declaramos el segundo renglon del formulario -->
                        <div class="row">
                            <!-- Declaramos la primer coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="id_munucipio">Proveedor del producto</label>
                                <select class="form-select" aria-label="Default select example" name="id_proveedor">
                                    <option selected>Proveedor...</option>
                                    <?php foreach ($datosProveedors as $key => $proveedor): 
                                    $selected = "";
                                      if($proveedor['nombre_proveedor'] == $datosProductos['proveedor']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $proveedor['id_proveedor'];?>" <?php echo $selected; ?>>
                                        <?php echo $proveedor['nombre_proveedor']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- Declaramos la SEGUNDO coluna de 6/12 espacios del primer renglon del formulario -->
                            <div class="col-6">
                                <label for="id_munucipio">Sucursal de la productos</label>
                                <select class="form-select" aria-label="Default select example" name="id_sucursal">
                                    <option selected>Sucursal...</option>
                                    <?php foreach ($datosSucursals as $key => $sucursal): 
                                    $selected = "";
                                      if($sucursal['nombre_sucursal'] == $datosProductos['sucursal']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $sucursal['id_sucursal'];?>" <?php echo $selected; ?>>
                                        <?php echo $sucursal['nombre_sucursal']?> </option>
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