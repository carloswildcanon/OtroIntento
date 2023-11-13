<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

/**
 * menu de inicio
 * @return int
 */
function seleccionarOpcion(){
    //int $opcionElegida
    do{
        echo "-------------------------------------------  \n";
        echo "1) Jugar Wordix con una palabra elegida.\n";
        echo "2) Jugar Wordix con una palabra aleatoria.\n";
        echo "3) Mostrar una partida.\n";
        echo "4) Mostrar la primer partida.\n";
        echo "5) Mostrar resumen del jugador.\n";
        echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra.\n";
        echo "7) Agregar una palabra de 5 letras a Wordix.\n";
        echo "8) Salir.\n";
        echo "Selecione una de las opciones anteriores:(un numero de 1-8) ";
        $opcionElegida = trim(fgets(STDIN));
    }while(!(is_numeric($opcionElegida) && (($opcionElegida == (int)$opcionElegida) && ($opcionElegida >= 1 &&  $opcionElegida<= 8))));    
    return $opcionElegida;
}


/**
 * pide el nombre de usuario
 * @return string
 */
function nombreUsuario(){
    //string $usuario
    echo "Ingrese su nombre de usuario: ";
    $usuario=strtolower(trim(fgets(STDIN)));
    return $usuario;
}


/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
