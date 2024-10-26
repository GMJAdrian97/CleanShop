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
                <h2><?php echo(isset($id_estado))? "MODIFICA TU ": "AÑADE UN NUEVO ";?>ESTADO</h2>
                 <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlestado.php?accion=<?php echo(isset($id_estado))? "update&id_estado=".$id_estado: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <label for="nombre">Nombre del estado</label>
                        <input type="text" id="nombre" name="nombre_estado" placeholder="Ejem; Guanajuato" required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                        value="<?php echo(isset($id_estado)) ? $datosestado['nombre_estado']:"";?>">
                    </div>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</section>