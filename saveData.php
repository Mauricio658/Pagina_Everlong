<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreApellido = $_POST['nombreapellido'];
    $correoElectronico = $_POST['correoelectronico'];
    $telefono = "'" . $_POST['telefono'];  // Agrega un apóstrofo para asegurar el formato de texto
    $mensaje = $_POST['mensaje'];
    $contactoPreferido = $_POST['contacto'];
    $horarioPreferido = $_POST['horario'];

    // Archivo CSV donde se guardarán los datos
    $archivo = "data.csv";

    // Crear o abrir el archivo CSV
    $handle = fopen($archivo, 'a+');

    // Checar si el archivo está vacío y agregar encabezados si es necesario
    if (ftell($handle) === 0) {
        fputcsv($handle, ['Nombre y Apellido', 'Correo Electrónico', 'Teléfono', 'Mensaje', 'Contacto Preferido', 'Horario Preferido']);
    }

    // Array con los datos a guardar
    $data = [$nombreApellido, $correoElectronico, $telefono, $mensaje, $contactoPreferido, $horarioPreferido];

    // Escribir los datos en el archivo CSV
    fputcsv($handle, $data);

    // Cerrar el archivo
    fclose($handle);

    // Redirigir o informar al usuario
    echo "Información guardada correctamente. <a href='index.html'>Volver al inicio</a>";
}
?>

