<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icons Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!------- CSS DashBoard ------->
    <link href="/CleanShop/css/dashstyle.css" rel="stylesheet" />
    <!-- CSS de DataTables 1.13.6 -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
    <link href="/CleanShop/css/styledatatables.css" rel="stylesheet" />
    <!-- CSS de formularios -->
    <link rel="stylesheet" href="/CleanShop/css/cssfomularios.css">
    <!-- CSS de Login -->
    <link rel="stylesheet" href="/CleanShop/css/login.css">



    <title>Hello, world!</title>
</head>

<body>
    <!------------------------------------------ I NavBar ----------------------------------------->
    <div class="page-header">
        <nav>
            <!------------------------------------------ I Logo ----------------------------------------->
            <a href="#0" aria-label="forecastr logo" class="logo">
                <img src="/CleanShop/img/logoejem.png" width="140" height="49" alt="Logo" />
            </a>
            <!------------------------------------------ F Logo ----------------------------------------->
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
                <svg width="20" height="20" aria-hidden="true">
                    <use xlink:href="#down"></use>
                </svg>
            </button>
            <ul class="admin-menu">
                <li class="menu-heading">
                    <h3>Admin</h3>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/productos/ctrlproductos.php">
                        <i class="bi bi bi-people-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/marcas/ctrlmarca.php">
                        <i class="bi bi-person-vcard" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/calidad/ctrlcalidad.php">
                        <i class="bi bi-person-fill-up" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Asignacion de rol</span>
                    </a>
                </li>
                <li class="menu-heading">
                    <h3>Productos</h3>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/productos/ctrlproductos.php">
                        <i class="bi bi-bag-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/marcas/ctrlmarca.php">
                        <i class="bi bi-award-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Marcas</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/calidad/ctrlcalidad.php">
                        <i class="bi bi-check2" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Calidad</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/proveedores/ctrlproveedor.php">
                        <i class="bi bi-truck" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li class="menu-heading">
                    <h3>Sucursales</h3>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/municipio/ctrlmunicipio.php">
                        <i class="bi bi-buildings" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Ciudad</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/estado/ctrlestado.php">
                        <i class="bi bi-map-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Estado</span>
                    </a>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/sucursal/ctrlsucursal.php">
                        <i class="bi bi-shop" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Sucursales</span>
                    </a>
                </li>
                <li class="menu-heading">
                    <h3>Envios</h3>
                </li>
                <li>
                    <a href="#0">
                        <i class="bi bi-send-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Enviar</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="bi bi-filetype-pdf"" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Comprobantes</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="bi bi-journal-bookmark-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Historial</span>
                    </a>
                </li>
                <li class="menu-heading">
                    <h3>Ventas</h3>
                </li>
                </li>
                <li>
                    <a href="#0">
                        <i class="bi bi-basket2" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Realizar Ventas</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="bi bi-filetype-pdf" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Comprobantes</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="bi bi-journal-bookmark-fill" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Historial</span>
                    </a>
                </li>
                <li class="menu-heading">
                    <h3>Ajustes</h3>
                </li>
                <li>
                    <div class="switch">
                        <input type="checkbox" id="mode" checked>
                        <label for="mode">
                            <span></span>
                            <span>Dark</span>
                        </label>
                    </div>
                    <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                        <i class="bi bi-arrows-collapse-vertical" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Colapsar</span>
                    </button>
                </li>
                <li>
                    <a href="/CleanShop/panel/views/login/ctrllogin.php?action=Logout1">
                        <i class="bi bi-box-arrow-in-left" style="font-size: 20px; margin-right: 10px;"></i>
                        <span>Cerrar Sesion</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!------------------------------------------ F NavBar ----------------------------------------->