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
                <h2><?php echo(isset($id_proveedor))? "MODIFICA TU ": "AÑADE UN NUEVO ";?>PROVEEDOR</h2>
                 <!-- Inicio del formulario -->
                <form method="POST"
                    action="ctrlproveedor.php?accion=<?php echo(isset($id_proveedor))? "update&id_proveedor=".$id_proveedor: "add"; ?>"
                    enctype="multipart/form-data">
                    <div class="formulario-grupo">
                        <label for="nombre">Nombre del proveedor</label>
                        <input type="text" id="nombre" name="nombre_proveedor" placeholder="Ejem; Gueros" required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                        value="<?php echo(isset($id_proveedor)) ? $datosproveedor['nombre_proveedor']:"";?>">
                        <label for="telefono">Telefono del proveedor</label>
                        <input type="text" id="telefono" name="telefono_proveedor" placeholder="Ejem; 461..." required pattern="^[0-9]+$"
                        value="<?php echo(isset($id_proveedor)) ? $datosproveedor['telefono_proveedor']:"";?>">
                    </div>
                    <button type="submit" class="formulario-boton">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</section>