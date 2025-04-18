<?php
include 'conexion.php'; // Conexión a la base de datos

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $sqlCommand = $input['command'] ?? '';

    if (empty($sqlCommand)) {
        echo json_encode(['error' => 'No se recibió ningún comando.']);
        exit;
    }

    try {
        $result = pg_query($conexion, $sqlCommand);

        if (!$result) {
            echo json_encode(['error' => pg_last_error($conexion)]);
        } else {
            if (pg_num_rows($result) > 0) {
                $rows = [];
                $headers = [];
                $output = '';

                // Obtener encabezados
                $numFields = pg_num_fields($result);
                for ($i = 0; $i < $numFields; $i++) {
                    $headers[] = str_pad(pg_field_name($result, $i), 20); // Ajustar ancho fijo
                }

                // Formatear encabezados
                $output .= implode(' | ', $headers) . "\n";
                $output .= str_repeat('-', strlen($output)) . "\n";

                // Formatear filas
                while ($row = pg_fetch_assoc($result)) {
                    $formattedRow = [];
                    foreach ($row as $value) {
                        $formattedRow[] = str_pad($value, 20); // Ajustar ancho fijo
                    }
                    $output .= implode(' | ', $formattedRow) . "\n";
                }

                echo json_encode(['data' => $output]);
            } else {
                echo json_encode(['message' => 'Comando ejecutado correctamente, sin resultados.']);
            }
        }
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }

    pg_close($conexion);
}
?>