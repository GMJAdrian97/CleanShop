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
                <h2><?php echo(isset($id_marca))? "MODIFICA TU ": "AÑADE UNA NUEVA ";?>MARCA</h2>
                 <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlmarca.php?accion=<?php echo(isset($id_marca))? "update&id_marca=".$id_marca: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <label for="nombre">Nombre del marca</label>
                        <input type="text" id="nombre" name="nombre_marca" placeholder="Ejem; Fabuloso" required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$"
                        value="<?php echo(isset($id_marca)) ? $datosmarca['nombre_marca']:"";?>">
                    </div>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</section>