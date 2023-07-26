<!doctype html>
<html lang = "es">
<head>
    <meta charset = " utf-8">
    <title>Suma de un Array</title>

</head>
<body>
<?php
echo "<h1>Funcion para realizar la suma de los numeros pares de un array</h1><hr/>";
// declarar la variable que contendra el array e indicarle los valores pertenecientes al array
$datos = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);


function suma_array($datos){
    $suma = 0;
    foreach ($datos as $numeros)
        // Realizo la comprobacion utilizando el operador Modulo para comprobar los numeros pares
        if($numeros % 2 == 0){
            $suma += $numeros;
        }

        return $suma;

}

$total = suma_array($datos);
echo "<strong>La suma de los numeros pares de array es de: </strong>"."<h2>".$total."</h2>";

?>
</body>

</html>


