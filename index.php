<?php
    
    //Consultar la base de datos -> 1. Importar la conexión
    require '../includes/config/databases.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $db = conectarDB(); //esta es la instancia de conexión a la BD

    //2. Escribir el Query
    $query = "SELECT * FROM propiedades";


    //3.Consultar la BD (hacer uso de MyQSLi)
    $resultadoBd = mysqli_query($db, $query);



    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    
    //Incluye un template
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if( intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>
            
        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </head>

            <tbody>  <!-- 4. Mostrar los resultados de BD -->

            <?php while ($propiedad = mysqli_fetch_assoc($resultadoBd)): ?>

                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['titulo']; ?> </td>
                    <td><img src="../imagenes/aa6b912c417d5e78acbebe6df7074a53.jpg" class="imagen-tabla"></td>
                    <td>$12000</td>
                    <td><a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-verdeClaro-block">Actualizar</a>

                </td>
                </tr>

                <?php endwhile; ?>

            </tbody>
        
        </table>
    </main>


<?php

    //5. Cerrar la conexion (opcional)

    incluirTemplate('footer');
?>
