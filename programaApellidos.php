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
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "JAPON", "PERRO", "ZORRO", "QUINO", "AKIRA",
        "CHILE", "URGIR", "DADOS", "JUGAR", "JUNCO",
        "SALIR", "MANTA", "MARTE", "VENUS", "XENON"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

/**
 * obtiene las partidas jugadas
 * @return array
 */
function cargarPartidas(){
    $partidas=[["palabraWordix"=>"FUEGO", "jugador"=>"laura","intentos"=>2,"puntaje"=>12],
               ["palabraWordix"=>"VERDE", "jugador"=>"diego","intentos"=>6,"puntaje"=>0],
               ["palabraWordix"=>"PIANO", "jugador"=>"laura","intentos"=>4,"puntaje"=>12],
               ["palabraWordix"=>"PISOS", "jugador"=>"josefina","intentos"=>5,"puntaje"=>13],
               ["palabraWordix"=>"GOTAS", "jugador"=>"marcos","intentos"=>1,"puntaje"=>16],
               ["palabraWordix"=>"YUYOS", "jugador"=>"laura","intentos"=>3,"puntaje"=>15],
               ["palabraWordix"=>"XENON", "jugador"=>"olga","intentos"=>6,"puntaje"=>12],
               ["palabraWordix"=>"CHILE", "jugador"=>"pato","intentos"=>5,"puntaje"=>10],
               ["palabraWordix"=>"ZORRO", "jugador"=>"pedro","intentos"=>1,"puntaje"=>17],
               ["palabraWordix"=>"GATOS", "jugador"=>"carlos","intentos"=>2,"puntaje"=>15],
               ["palabraWordix"=>"NAVES", "jugador"=>"diego","intentos"=>3,"puntaje"=>15],
               ["palabraWordix"=>"AKIRA", "jugador"=>"andres","intentos"=>5,"puntaje"=>10]];

    return $partidas;

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
        echo "Selecione una de las opciones anteriores:(un numero del 1 al 8 ) ";
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


/**
 * pide un numero
 * @param array $palabrasCargadas
 * @return int
 */
function ingresarNumero($palabrasCargadas){
    // int $cantidadPalabras
    //int $numeroIngresado
    $cantidadPalabras = count($palabrasCargadas);
    echo "Ingrese un numero: ";
    $numeroIngresado = solicitarNumeroEntre(0,$cantidadPalabras);
    return $numeroIngresado;
}


/**
 * saber si ya se uso la palabra
 * @param string $nomUsuario
 * @param array $partidasCargadas
 * @param string $palabraBuscada
 * @return boolean
 */
function palabraFueUsada($nomUsuario,$partidasCargadas,$palabraBuscada){
    //boolean $usada
    //array $arreglo
    $usada= false;
    foreach($partidasCargadas as $arreglo){
        if ($arreglo["jugador"]==$nomUsuario && $arreglo["palabraWordix"]==$palabraBuscada){
            echo "La palabra ya fue jugada\n";
            $usada = true;
        }
    }
    return $usada;
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:

$partidasJugadas = cargarPartidas();
$palabrasDisponible = cargarColeccionPalabras();


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);




do {
    $opcion = seleccionarOpcion();

    
    switch ($opcion) {
        case 1: 
            $nombre=nombreUsuario();
            do{
                $numero = ingresarNumero($palabrasDisponible);
                $palabraSelecionada=$palabrasDisponible[$numero];
                $palUsada=palabraFueUsada($nombre,$partidasJugadas,$palabraSelecionada);
            }while($palUsada);
            $partida = jugarWordix($palabraSelecionada, $nombre);
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
} while ($opcion != 8);

