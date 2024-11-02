<?php
require_once("../../../componentes/header.php");
?>

<section class="page-content">
    <!-- Seccion de saludo a admin -->
    <!-- <section class="section-user">
        <div class="admin-profile">
            <span class="greeting">Hola Administrador</span>
            <div class="notifications">
                <span class="badge">1</span>
                <svg>
                    <use xlink:href="#users"></use>
                </svg>
            </div>
        </div>
    </section> -->
    <!-- Seccion de saludo a admin -->
    <section class="home">
        <div>
            <a class="btn "
                style="background-color: #0EBEFF; color:white; font-weight: bold; font-size: 1.4em; display: block; margin: 2rem;"
                href="ctrlproductos.php?accion=new"> Añadir nuevo Producto</a>

            <table id="myTable" class="display">
                <!-- Importante que la tabla lleve id="myTable" class="display" para que funcione la DataTable -->
                <thead>
                    <tr>
                        <th scope="col">ID</th>
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
                foreach ($datosProductos as $key => $datosProducto):
            ?>

                    <tr>
                        <th scope="row"><?php echo $datosProducto['id_producto']; ?></th>
                        <td><?php echo $datosProducto['nombre_producto']; ?></td>
                        <td><?php echo $datosProducto['img_producto']; ?></td>
                        <td><?php echo $datosProducto['descripcion_producto']; ?></td>
                        <td><?php echo $datosProducto['precio_adquisicion']; ?></td>
                        <td><?php echo $datosProducto['precio_menudeo']; ?></td>
                        <td><?php echo $datosProducto['precio_mayoreo']; ?></td>
                        <td><?php echo $datosProducto['precio_vip']; ?></td>
                        <td><?php echo $datosProducto['color_producto']; ?></td>
                        <td><?php echo $datosProducto['tipo_producto']; ?></td>
                        <td>
                            <div>
                                <a
                                    href="ctrlproductos.php?accion=modify&id_producto=<?php echo $datosProducto['id_producto']; ?>"><button
                                        type="button" id="table_button2" class="btn btn-success bi-pencil"
                                        style="background-color: #019df4; color:white;"></button></a>
                                <a
                                    href="ctrlproductos.php?accion=delete&id_producto=<?php echo $datosProducto['id_producto']; ?>"><button
                                        type="button" id="table_button2" class="btn btn-danger bi bi-trash"
                                        style="background-color: red; color:white;"></button></a>
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