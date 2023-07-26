<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar el correo electrónico
    if (!isset($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico es incorrecto. Por favor, ingresa un correo válido.";
        exit;
    }

    // Continuar con el proceso de lectura del archivo TXT y otras operaciones aquí...
}
    if (isset($_FILES['files'])) {
        // Obtener el nombre y ubicación temporal del archivo subido
        $nombreArchivo = $_FILES['files']['name'];
        
        $location = $_FILES['files']['tmp_name'];
        //var_dump($location);
        // Abrir el archivo para lectura
        $lista = fopen($location, 'r');

        if ($lista) {
            $array_lista = array();

        while(!feof($lista)){
            $leer = fgets($lista); 
            $leer = trim($leer);   
           
        
        if (!empty($lista)){
            $array_lista[] = $leer;
            
        }
    
    }
    // var_dump($array_lista);
    echo "<table border= '1'>
            <th width='100'>Palabra</th>
            <th width='100'>Cantidad de letras </th>
          </table>";
    fclose($lista);

}else {
    echo "No se pudo abrir el archivo de texto";
}

}
// Crear tabla a partir del array y recorrer cada palabra del array con el ciclo foreach

foreach ($array_lista as $content){

    echo "<table border='1'>
    <td width='100'>".$content."</td>
    <td width='100'>".strlen($content)."</td>
    </table>";
    
}
?>