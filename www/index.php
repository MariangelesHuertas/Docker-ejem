<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ratings Viewer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9c7a5; /* Color de fondo café claro */
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #5d4037; /* Color del título café oscuro */
        }

        .error {
            color: #b71c1c; /* Color del mensaje de error rojo oscuro */
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #d7ccc8; /* Color del borde café claro */
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #795548; /* Color de fondo del encabezado de la tabla café */
            color: #fff; /* Color del texto del encabezado de la tabla */
        }

        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Agrega un formulario simple para ingresar la cantidad de datos a mostrar -->
    <div class="container">
        <h1 class="mt-4">Ratings Viewer</h1>
    
        <!-- Formulario para la cantidad de datos -->
        <form method="GET" action="">
            <label for="cantidad">Cantidad de datos a mostrar:</label>
            <input type="number" name="cantidad" value="5" min="1">
            <button type="submit" class="btn btn-primary">Mostrar</button>
        </form>
    
        <?php
        $api_url = "http://api:5000/api/ratings?cantidad=" . $_GET['cantidad'];  // Agrega el parámetro cantidad a la URL
    
        $json = @file_get_contents($api_url);
    
        if ($json !== false) {
            $ratings = json_decode($json, true);
    
            echo '<div class="table-container">';
            echo '<table class="table table-bordered">';
    
            // Cabecera de la tabla
            echo '<thead>';
            echo '<tr>';
            foreach ($ratings[0] as $key => $value) {
                echo '<th scope="col">' . htmlspecialchars($key) . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
    
            // Contenido de la tabla
            echo '<tbody>';
            foreach ($ratings as $row) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
    
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="error mt-4">Error fetching data from API.</p>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
