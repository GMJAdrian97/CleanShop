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
                <h2><?php echo(isset($id_calidad))? "MODIFICA TU ": "AÑADE UNA NUEVA ";?>CALIDAD</h2>
                 <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlcalidad.php?accion=<?php echo(isset($id_calidad))? "update&id_calidad=".$id_calidad: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <label for="descripcion">Descripcion de la calidad</label>
                        <input type="text" id="nombre" name="descripcion_calidad" placeholder="Ejem; Baja, excelente..." required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                        value="<?php echo(isset($id_calidad)) ? $datoscalidad['descripcion_calidad']:"";?>">
                    </div>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</section>