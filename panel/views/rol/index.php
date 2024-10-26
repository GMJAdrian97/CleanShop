<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
/* --- Declaramos el Header --- */
require_once("../../../componentes/header.php");
?>

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
            <!-- Declaramos el boton y le damos la ruta del controlador con la accion de new (para que el switch lo cache) y asi llamar al formulario -->
            <a class="btn " href="ctrlrol.php?accion=new" 
                style="background-color: #019df4; color:white; font-weight: bold; font-size: 1.4em; display: block; margin: 2rem;">
                Añadir nuevo rol</a>
            <!-- Creamos la tabla que mostrara la informacion de la tabla -->
            <table id="myTable" class="display">
                <!-- Importante que la tabla lleve id="myTable" class="display" para que funcione la DataTable -->
                <thead>
                    <tr>
                        <th scope="col">ID rol</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Foreach para llenar la tabla con el arrglo obtenido "datosrols" de la funcion read del modelo de rol -->
                    <?php
                foreach ($datosrols as $key => $datosrol): 
            ?>

                    <tr>
                        <th scope="row"><?php echo $datosrol['id_rol']; ?></th>
                        <td><?php echo $datosrol['nombre_rol']; ?></td>
                        <td>
                            <div>
                                <!-- Declaramos el boton y le damos la ruta del controlador con la accion de modify (para que el switch lo cache)
                                 y el id que queremos modificar para llamar al formulario -->
                                <a
                                    href="ctrlrol.php?accion=modify&id_rol=<?php echo $datosrol['id_rol']; ?>"><button
                                        type="button" id="table_button2" class="btn btn-success bi-pencil"
                                        style="background-color: #019df4; color:white;">
                                        Editar</button></a>
                                <!-- Declaramos el boton y le damos la ruta del controlador con la accion de delete (para que el switch lo cache)
                                 y el id que queremos borrar -->
                                <a
                                    href="ctrlrol.php?accion=delete&id_rol=<?php echo $datosrol['id_rol']; ?>"><button
                                        type="button" id="table_button2" class="btn btn-danger bi bi-trash"
                                        style="background-color: red; color:white;">
                                        Borrar</button></a>
                            </div>
                        </td>
                    </tr>
                    <!-- Cierre del foreach -->
                    <?php
                endforeach;
            ?>
            </table>

        </div>
    </section>
</section>


<?php
/* --- Declaramos el footer --- */
require_once("../../../componentes/footer.php");
?>