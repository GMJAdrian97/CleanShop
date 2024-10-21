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
                <h2><?php echo(isset($id_categoria))? "MODIFICA TU ": "AÑADE UNA NUEVA ";?>CATEGORIA</h2>
                 <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlcategoria.php?accion=<?php echo(isset($id_categoria))? "update&id_categoria=".$id_categoria: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <label for="nombre">Nombre de la categoria</label>
                        <input type="text" id="nombre" name="nombre_categoria" placeholder="Ejem; Plasticos" required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                        value="<?php echo(isset($id_categoria)) ? $datoscategoria['nombre_categoria']:"";?>">
                    </div>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</section>