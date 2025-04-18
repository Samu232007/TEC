<?php
// Conexión a la base de datos PostgreSQL
include 'conexion.php';
session_start();
$ID= $_SESSION['ID'];

// Verificar si se recibió el parámetro 'accion'
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    switch ($accion) {
        case 'lista_estudiantes':
            // Consulta para obtener la lista de estudiantes
            $query = "SELECT * FROM estudiante WHERE num_cedula = '$ID'";
            $result = pg_query($conexion, $query);

            if (!$result) {
                die("Error al ejecutar la consulta.");
            }

            // Generar tabla con los resultados
            if (pg_num_rows($result) > 0) {
                echo "<h2>Información personal</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>Número de cédula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Adecuación</th>
                            <th>Correo</th>
                            <th>Télefono</th>
                            <th>Dirección</th>
                        </tr>";
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['num_cedula']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['apellidos']}</td>
                            <td>{$row['adecuacion']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['num_telefono']}</td>
                            <td>{$row['direccion']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron estudiantes.";
            }

            $consulta = "SELECT ID_estudiante, D.nombre AS departamento, C.nombre AS carrera, M.nombre_materia, G.grupo, S.nombre_sede, curso_lectivo, EI.cuatrimestre
                        FROM estudiante_info EI
                        JOIN Departamentos D ON EI.id_departamento = D.id_departamento
                        JOIN Carreras C ON EI.id_carrera = C.id_carrera
                        JOIN Materias M ON EI.id_materia = M.id_materia
                        JOIN Grupos G ON EI.id_grupo = G.id_grupo
                        JOIN Sedes S ON EI.id_sede = S.id_sede
                        WHERE ID_estudiante = '$ID'
                        ";
            $resultado = pg_query($conexion, $consulta);

            if (!$resultado) {
                die("Error al ejecutar la consulta.");
            }

            // Generar tabla con los resultados
            if (pg_num_rows($resultado) > 0) {
                echo "<h2>Materias matriculadas</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>Materia</th>
                            <th>Carrera</th>
                            <th>Departamento</th>
                            <th>Grupo</th>
                            <th>Cuatrimestre</th>
                            <th>Sede</th>
                            <th>Curso Lectivo</th>
                        </tr>";
                while ($row = pg_fetch_assoc($resultado)) {
                    echo "<tr>
                            <td>{$row['nombre_materia']}</td>
                            <td>{$row['carrera']}</td>
                            <td>{$row['departamento']}</td>
                            <td>{$row['grupo']}</td>
                            <td>{$row['cuatrimestre']}</td>
                            <td>{$row['nombre_sede']}</td>
                            <td>{$row['curso_lectivo']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron estudiantes.";
            }

            break;

        case 'carreras_materias':
            // Consulta para obtener las carreras y materias de cada estudiante
            $query = "SELECT e.num_cedula, e.nombre, c.nombre_carrera, m.nombre_materia 
                      FROM estudiantes e
                      JOIN carreras c ON e.id_carrera = c.id_carrera
                      JOIN materias m ON c.id_carrera = m.id_carrera";
            $result = pg_query($conexion, $query);

            if (!$result) {
                die("Error al ejecutar la consulta.");
            }

            // Generar tabla con los resultados
            if (pg_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID Estudiante</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Materia</th>
                        </tr>";
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['num_cedula']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['nombre_carrera']}</td>
                            <td>{$row['nombre_materia']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron datos de carreras y materias.";
            }
            break;

        default:
            echo "Acción no válida.";
            break;
    }
} else {
    echo "No se especificó ninguna acción.";
}

pg_close($conexion);
?>
