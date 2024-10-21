<?php
require_once("../../../componentes/header.php");
?>

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
    <!-- Seccion de saludo a admin -->
    <section class="home">
            <div style="padding: 2rem;">
                <a class="btn "
                    style="background-color: #019df4; color:white; font-weight: bold; font-size: 1.4em; display: block; margin: 2rem;"
                    onclick="avisoCreate()"> Añadir nueva ciudad</a>

                <table id="myTable" class="display"> <!-- Importante que la tabla lleve id="myTable" class="display" para que funcione la DataTable -->
                    <thead>
                        <tr>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Img</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio adquisicion</th>
                            <th scope="col">Precio Menudeo</th>
                            <th scope="col">Precio Mayoreo</th>
                            <th scope="col">Precio VIP</th>
                            <th scope="col">Color</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                foreach ($datosCiudades as $key => $datosCiudad):
            ?>

                        <tr>
                            <th scope="row"><?php echo $datosCiudad['id_ciudad']; ?></th>
                            <td><?php echo $datosCiudad['nombre_ciudad']; ?></td>
                            <td><?php echo $datosCiudad['estado']; ?></td>
                            <td>
                                <div>
                                    <a
                                        href="ctrlCiudad.php?accion=modify&id_ciudad=<?php echo $datosCiudad['id_ciudad']; ?>"><button
                                            type="button" id="table_button2" class="btn btn-success bi-pencil"
                                            style="background-color: #019df4; color:white;">
                                            Editar</button></a>
                                    <a><button type="button" id="table_button2" class="btn btn-danger bi bi-trash"
                                            onclick="avisoDelete(<?php echo $datosCiudad['id_ciudad']; ?>)"
                                            style="display: none;">
                                            Borrar</button></a>
                                </div>
                            </td>
                        </tr>

                        <?php
                endforeach;
            ?>
                </table>

            </div>
    </section>
</section>


<?php
require_once("../../../componentes/footer.php");
?>