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
                <h2>BOOKING & CONTACT</h2>
                 <!-- Inicio del formulario -->
                <form action="#" method="post">
                    <div class="formulario-grupo">
                        <label for="nombre">Name</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Your Name" required>
                    </div>
                    <div class="formulario-grupo">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="formulario-grupo">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required>
                    </div>
                    <div class="formulario-grupo-flex">
                        <div class="formulario-grupo">
                            <label for="street">Street</label>
                            <input type="text" id="street" name="street" placeholder="Your Street" required>
                        </div>
                        <div class="formulario-grupo">
                            <label for="number">Number</label>
                            <input type="text" id="number" name="number" placeholder="Street Number" required>
                        </div>
                    </div>
                    <div class="formulario-grupo-flex">
                        <div class="formulario-grupo">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="Your City" required>
                        </div>
                        <div class="formulario-grupo">
                            <label for="postcode">Post Code</label>
                            <input type="text" id="postcode" name="postcode" placeholder="Your Post Code" required>
                        </div>
                    </div>
                    <button type="submit" class="formulario-boton">Submit</button>
                </form>
            </div>
        </div>
    </section>
</section>