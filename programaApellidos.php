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
        echo "\n-------------------------------------------  \n";
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
        echo "\n----------------------------------------------";
        echo "\n\n";
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
 * @param int $nroMin ,$nroMax
 * @return int
 */
function ingresarNumero($nroMin,$nroMax){
    // int $cantidadPalabras
    //int $numeroIngresado
    
    echo "Ingrese un numero: ";
    $numeroIngresado = solicitarNumeroEntre($nroMin,$nroMax);
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



/**
 * imprime datos de una partida 
 * @param array $datosPartida
 * @param int $nroPartida
 * 
 */
function muestraPartida($datosPartida,$nroPartida){
    echo "**********************************************************************************\n";
    echo "Partida Wordix ". $nroPartida. ": Palabra ". $datosPartida["palabraWordix"]. "\n";
    echo "Jugador: ". $datosPartida["jugador"]. "\n";
    echo "Puntaje: ". $datosPartida["puntaje"]. "\n";
    if($datosPartida["puntaje"] != 0){
        echo "Intento: Adivinó la palabra en ". $datosPartida["intentos"]. " intentos\n";    
    }else{
        echo "Intento: No adivinó la palabra\n";
    }
    echo "**********************************************************************************\n";
} 

/**
 * Mustra la primera partida del jugador seleccionado
 * @param string $nomUsuario
 * @param array $partidasCargadas
 */
function buscarPrimeraPartida($nomUsuario,$partidasCargadas){
    //int $posicion
    //array $arreglo
    //boolean $nogano
    $nogano=true;
    $posicion= 1;
    $entrarLaprimeraVez = true;
    foreach($partidasCargadas as $arreglo){
        if (($arreglo["jugador"]==$nomUsuario && $arreglo["puntaje"]!= 0)){
            if ($entrarLaprimeraVez){
                muestraPartida($arreglo,$posicion);
            }
            $entrarLaprimeraVez =false;
            $nogano=false;
        }
        $posicion++ ;
    }
    if ($nogano){
        echo "\n*****************************************************\n";
        echo "el jugardor ". $nomUsuario. " no gano ninguna partida\n";
        echo "*******************************************************\n";
    }
    
}




function buscaDatosJugador($nomJugador,$partidasRealizadas){
    $partidasJugador=0;
    $puntosJugador=0;
    $victoriasJugador=0;
    $partidasGanadaInt1=0;
    $partidasGanadaInt2=0;
    $partidasGanadaInt3=0;
    $partidasGanadaInt4=0;
    $partidasGanadaInt5=0;
    $partidasGanadaInt6=0;
    foreach($partidasRealizadas as $partidaIndividual){
        if ($partidaIndividual["jugador"] == $nomJugador){
            $partidasJugador++;
            $puntosJugador=$puntosJugador+$partidaIndividual["puntaje"];
            if ($partidaIndividual["puntaje"]!=0){
                $victoriasJugador++;
            }
            switch($partidaIndividual["intentos"]){
                case 1:
                    $partidasGanadaInt1++;
                    break;
                case 2:
                    $partidasGanadaInt2++;
                    break;
                case 3:
                    $partidasGanadaInt3++;
                    break;
                case 4:
                    $partidasGanadaInt4++;
                    break;
                case 5:
                    $partidasGanadaInt5++;
                    break;
                case 6:
                    $partidasGanadaInt6++;
                    break;
            }

        }

    }
    if ($partidasJugador != 0){
        $porcentajeVictorias= $victoriasJugador/$partidasJugador*100;
    }else{
        $porcentajeVictorias=0;
    }
    $estadisticasJugador=["jugador" => $nomJugador,"partidas"=>$partidasJugador,
                          "puntajeTotal" => $puntosJugador, "victorias" => $victoriasJugador,
                          "porcentajeVictorias" => $porcentajeVictorias,"victoriasInt1"=>$partidasGanadaInt1,
                          "victoriasInt2"=>$partidasGanadaInt2,"victoriasInt3"=>$partidasGanadaInt3,
                          "victoriasInt4"=>$partidasGanadaInt4,"victoriasInt5"=>$partidasGanadaInt5,
                          "victoriasInt6"=>$partidasGanadaInt6];

    return $estadisticasJugador;
}

function imprimirEstadisticas($arregloEstadisticas){
    echo "\n*************************************\n";
    echo "Jugador : ". $arregloEstadisticas["jugador"]. "\n";
    echo "Partidas : ". $arregloEstadisticas["partidas"]. "\n";
    echo "Puntaje Total : ". $arregloEstadisticas["puntajeTotal"]. "\n";
    echo "Victorias : ". $arregloEstadisticas["victorias"]. "\n";
    echo "Porcentaje Victorias : ". $arregloEstadisticas["porcentajeVictorias"]. "%\n";
    echo "Adivinadas : \n";
    echo "    Intento 1: ". $arregloEstadisticas["victoriasInt1"]. "\n";
    echo "    Intento 2: ". $arregloEstadisticas["victoriasInt2"]. "\n";
    echo "    Intento 3: ". $arregloEstadisticas["victoriasInt3"]. "\n";
    echo "    Intento 4: ". $arregloEstadisticas["victoriasInt4"]. "\n";
    echo "    Intento 5: ". $arregloEstadisticas["victoriasInt5"]. "\n";
    echo "    Intento 6: ". $arregloEstadisticas["victoriasInt6"]. "\n";
    echo "****************************************\n";
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$estadisticasJugador=[];
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
                $numero = ingresarNumero(0,count($palabrasDisponible));
                $palabraSelecionada=$palabrasDisponible[$numero];
                $palUsada=palabraFueUsada($nombre,$partidasJugadas,$palabraSelecionada);
            }while($palUsada);
            $partida = jugarWordix($palabraSelecionada, $nombre);
            array_push($partidasJugadas,$partida);
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            $nombre=nombreUsuario();
            do{
                $numero = array_rand($palabrasDisponible,1);
                $palabraSelecionada=$palabrasDisponible[$numero];
                $palUsada=palabraFueUsada($nombre,$partidasJugadas,$palabraSelecionada);
            }while($palUsada);
            $partida = jugarWordix($palabraSelecionada, $nombre);
            array_push($partidasJugadas,$partida);
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            $numero = ingresarNumero(1,count($partidasJugadas));
            muestraPartida($partidasJugadas[$numero-1],$numero);
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        case 4:
            echo "Ingrese el nombre del jugador: ";
            $nombre =strtolower(trim(fgets(STDIN)));
            buscarPrimeraPartida($nombre,$partidasJugadas);

            break;
            //...
        case 5:

            break;
    }
} while ($opcion != 8);

