<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Examen Php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark" class="d-flex flex-column min-vh-100">
    <header class="container-fluid">
        <div class="container">
            <div class="row align-items-center py-2">
                <!-- Sección del logo y nombre -->
                <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center text-center">
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
        <section class="py-4 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Instrucciones de la Aplicación</h1>
                    <p class="lead text-body-secondary">A continuación, se describen las funcionalidades de la
                        aplicación.</p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-body-tertiary flex-fill ">
            <div class="container">
                <h3>Página Inicial (<a href="index.php">index.php</a>)</h3>
                <ul class="mb-4">
                    <li><strong>Visualización de Personajes:</strong> Al acceder a la página inicial, se muestran todos
                        los personajes disponibles en la base de datos.</li>
                    <li><strong>Agregar al Equipo:</strong> El usuario puede agregar personajes a su equipo similar a un
                        carrito de la compra.</li>
                    <li><strong>Confirmación:</strong> Cada vez que un personaje es agregado, se muestra un mensaje de
                        confirmación.</li>
                    <li><strong>Deshabilitar Botón:</strong> Si un personaje ya está en el equipo, el botón de añadir se
                        deshabilita.</li>
                </ul>
                <h3>Página de Equipo (<a href="equipo.php">equipo.php</a>)</h3>
                <ul class="mb-4">
                    <li><strong>Visualización del Equipo:</strong> Muestra todos los personajes agregados al equipo en
                        una tabla.</li>
                    <li><strong>Eliminar del Equipo:</strong> Cada personaje tiene la opción de ser eliminado del
                        equipo.</li>
                    <li><strong>Confirmación de Eliminación:</strong> Al eliminar un personaje, se muestra un mensaje de
                        confirmación.</li>  
                    <li><strong>Equipo Vacío:</strong> Si no hay personajes en el equipo, se indica con un mensaje
                        correspondiente.</li>
                </ul>
                <h3>Funcionalidades Adicionales</h3>
                <ul class="mb-4">
                    <li><strong>Vaciar Equipo:</strong> Desde la página principal, se puede eliminar todos los
                        personajes del equipo, vaciando así el "carrito".</li>
                </ul>
            </div>
        </div>
    </main>
    <footer class="bg-dark color-primary text-body-secondary py-4 text-center">
        <p>© 2024 P.Lluyot. Todos los derechos reservados.</p>
    </footer>
</body>

</html>