<!DOCTYPE html>
<html lang='es'>

<?php
    include_once "views/header.php";
?>

<body data-bs-theme="dark" class="d-flex flex-column min-vh-100">
    <header class="container-fluid">
        <div class="container">
            <div class="row align-items-center py-2">
                <!-- Sección del logo y nombre -->
                <div
                    class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center text-center">
                    <img src="img/logo.jpg" alt="Logo" class="me-2" style="height: 40px;">
                    <h1 class="h4 mb-0">Equipos</h1>
                </div>
                <!-- Menú de navegación -->
                <div class="col-md-6">
                    <nav class="text-md-end text-center">
                        <a href="index.php" class="btn btn-link text-white">Inicio</a>
                        <a href="equipo.php" class="btn btn-link text-white">Equipo</a>
                        <a href="instrucciones.php" class="btn btn-link text-white">Instrucciones</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="flex-fill d-flex flex-column">
        <!-- sección principal de la aplicación, se muestra el título y botones para acceder a las distintas partes de la aplicación -->
        <section class="py-4 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Personajes del equipo</h1>
                    <p class="lead text-body-secondary">Prueba práctica con PHP empleando Bases de Datos y Sesiones</p>
                    <p>
                        <a href="index.php" class="btn btn-primary my-2">Elección de Personajes</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <!-- Título de la sección -->
                <div class="row text-center mb-4">
                    <h4>Integrantes del equipo</h4>
                    <p class="text-body-secondary">Estos son los integrantes de tu equipo, puedes pulsar el botón
                        "Eliminar" si no quieres contar con uno de ellos .</p>
                </div>
                <div class="alert alert-danger text-center" role="alert">Mensaje informativo</div>
                
                
                <!-- tabla que muestra los integrantes del equipo que están almacenados en la sesión -->
                <?php
                    crearTablaEquipo();
                ?>
            </div>
        </div>
    </main>
    <?php
        include_once "views/footer.php";
    ?>
</body>

</html>