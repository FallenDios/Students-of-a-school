<?php

// Algoritmo para obtener informacion sobre alumnos de un colegio secundario

/* 
INT $añoNacimiento, $edad, $maxEdad, $minEdad, $contadorAlumnos, $año, $edadMayor, $edadMenor
FLOAT $altura, $peso, $pesoTotal, $pesoPromedio, $pesoMenorEdad, $alturaMayorEdad
STRING $respuesta
*/

$maxEdad = 0;
$minEdad = 999;
$pesoTotal = 0;
$contadorAlumnos = 0;
$alturaMayorEdad = 0; // Inicialización para evitar error si no hay alumnos
$pesoMenorEdad = 0; // Inicialización para evitar error si no hay alumnos
$respuesta = "s";

do {
    echo "Ingrese el año en el que se encuentra:\n";
    $año = trim(fgets(STDIN));
    if(!is_numeric($año)){
        echo "Por favor, ingrese un año válido.\n";
        continue;
    }

    echo "Ingrese el año de nacimiento del alumno:\n";
    $añoNacimiento = trim(fgets(STDIN));
    if(!is_numeric($añoNacimiento)){
        echo "Por favor, ingrese un año de nacimiento válido.\n";
        continue;
    }

    echo "Ingrese la altura del alumno (en cm):\n";
    $altura = trim(fgets(STDIN));
    if(!is_numeric($altura)){
        echo "Por favor, ingrese una altura válida.\n";
        continue;
    }

    echo "Ingrese el peso del alumno (en kg):\n";
    $peso = trim(fgets(STDIN));
    if(!is_numeric($peso)){
        echo "Por favor, ingrese un peso válido.\n";
        continue;
    }

    $edad = $año - $añoNacimiento;
    $pesoTotal += $peso;
    $contadorAlumnos++;

    // Verificar si es el alumno de mayor edad
    if($edad > $maxEdad){
        $maxEdad = $edad;
        $alturaMayorEdad = $altura;
        $edadMayor = $edad;
    }

    // Verificar si es el alumno de menor edad
    if($edad < $minEdad){
        $minEdad = $edad;
        $pesoMenorEdad = $peso;
        $edadMenor = $edad;
    }

    echo "Desea ingresar los datos de otro alumno? (s/n)\n";
    $respuesta = trim(fgets(STDIN));
} while($respuesta == "s");

// Calcular el peso promedio
if($contadorAlumnos > 0){
    $pesoPromedio = $pesoTotal / $contadorAlumnos;
} else {
    $pesoPromedio = 0;
}

echo "\nResultados:\n";
echo "La altura y edad del alumno de mayor edad es: $alturaMayorEdad cm y $edadMayor años\n";
echo "El peso y edad del alumno de menor edad es: $pesoMenorEdad kg y $edadMenor años\n";
echo "El peso promedio de los alumnos es: $pesoPromedio kg\n";

?>
