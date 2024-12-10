<?php
    include_once "bd.php";
    include_once "sesiones.php";

    // Funcion que compruebe si un personaje esta en el equipo
    function personajeEnEquipo($idPersonaje){
        $res = false;
        
        if (isset($_SESSION['equipo'])){
            forEach($_SESSION['equipo'] as $integrante){
                if($integrante[0]==$idPersonaje){
                    $res = true;
                }
            }
        }

        return $res;
    }

    // Pintar personajes
    function listarPersonajes(){
        $personajes = personajesToList();

        forEach($personajes as $p){
            crearCardPersonaje($p);
        }
    }
    function crearCardPersonaje($arrayPersonaje){
        echo "<div class='col'>
                <div class='card shadow-sm'>";
            
        echo "<img src='".$arrayPersonaje[3]."' class='card-img-top img-fluid w-100' alt='Imagen del personaje'>
              <div class='card-body'>";

        echo "<h5 class='card-title text-center'>".$arrayPersonaje[1]."</h5>";
        echo "<p class='card-text'>".$arrayPersonaje[2]."</p>
              <div class=d-flex justify-content-between align-items-center'>";

        if (personajeEnEquipo($arrayPersonaje[0])){
            // En caso de que el personaje ya este en el equipo el boton no tendra ninguna funcionalidad
            echo "<div class='btn-group'>
                  <button type='submit' class='btn btn-sm btn-outline-secondary'>Añadir al equipo</button>
                  </div>";
        }
        else {
            // En caso de que el personaje no este en el equipo el boton añadira al personaje al equipo
            echo "<form method='post' action='formToAnadirPersonaje.php'>
                  <input type='hidden' id='id_personaje' name='id_personaje' value=".$arrayPersonaje[0].">
                  <input type='hidden' id='nombre' name='nombre' value='".$arrayPersonaje[1]."'>
                  <input type='hidden' id='descripcion' name='descripcion' value='".$arrayPersonaje[2]."'>
                  <input type='hidden' id='url' name='url' value='".$arrayPersonaje[3]."'>
                  <div class='btn-group'>";
            echo "<button type='submit' class='btn btn-sm btn-primary'>Añadir al equipo</button>
                  </div>
                  </form>";
        }
        echo "</div>
              </div>
              </div>
              </div>";

    }


    //////////////////////////////////////////////////////
    /////////////    TABLA EQUIPO   //////////////////////
    //////////////////////////////////////////////////////
    function crearTablaEquipo(){
        if (!equipoVacio()){
            echo "<table class='table table-striped align-middle'>
                    <thead>
                        <tr>
                            <th>Personaje</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>";

            forEach($_SESSION['equipo'] as $integrante){
                echo "<tr>
                        <td><img src=".$integrante[3]." alt=".$integrante[1]." class='img-fluid' style='width: 100px;'></td>
                        <td>".$integrante[1]."</td>
                        <td class='text-start'>".$integrante[2]."</td>
                        <td>
                            <form method='post' action='borrarPersonaje.php'>
                                <input type='hidden' id='id' name='id' value='".$integrante[0]."'>
                                <button type='submit' class='btn btn-sm btn-danger'>Eliminar</button>
                            </form>
                        </td>
                      </tr>";
            }
        }
    }
?>