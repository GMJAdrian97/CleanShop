<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!------- CSS ------->
    <link rel="stylesheet" href="/CleanShop/css/dashstyle.css" />
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
                    <a href="#0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-handbag-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 1 1 6 0v2h-1V3a2 2 0 0 0-2-2M5 5H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0z" />
                        </svg>
                        <span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#users"></use>
                        </svg>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#trends"></use>
                        </svg>
                        <span>Trends</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#collection"></use>
                        </svg>
                        <span>Collection</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#comments"></use>
                        </svg>
                        <span>Comments</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#appearance"></use>
                        </svg>
                        <span>Appearance</span>
                    </a>
                </li>
                <li class="menu-heading">
                    <h3>Settings</h3>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#settings"></use>
                        </svg>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#options"></use>
                        </svg>
                        <span>Options</span>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <svg>
                            <use xlink:href="#charts"></use>
                        </svg>
                        <span>Charts</span>
                    </a>
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
                        <svg aria-hidden="true">
                            <use xlink:href="#collapse"></use>
                        </svg>
                        <span>Collapse</span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
    <!------------------------------------------ F NavBar ----------------------------------------->