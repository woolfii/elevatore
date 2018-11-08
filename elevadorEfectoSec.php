<?php 
$actual = $_GET['actual'];
$origenes = $_GET['o1'];

include "elevador.php";
$pet = new Elevador($actual, $origenes);
$pet->pisoEmpieza();

switch ($pet->direccion) {
    case ($pet->direccion < 0):   //si sube en primera instancia
        print "Orden en que atendera las peticiones <br/><br/>" ;
        if ($pet->lonS1 > 0) {
            ordenarPeticionesDeSubida($pet->arraySube1);
        }
        if ($pet->lonB1 > 0) {
            ordenarPeticionesDeBajada($pet->arrayBaja1);
        }
        if ($pet->lonS2 > 0) {
            ordenarPeticionesDeSubida($pet->arraySube2);
        }

        print("<br/><br/> pisos en los que se detendra el elevador: <br/><br/> ");

        if ($pet->lonS1 > 0) {
            ordenarPisosDeSubida($pet->arraySube1);
        }
        if ($pet->lonB1 > 0) {
            ordenarPisosDeBajada($pet->arrayBaja1);
        }
        if ($pet->lonS2 > 0) {
            ordenarPisosDeSubida($pet->arraySube2);
        }
        break;

    case ($pet->direccion > 0):   //si baja en primera instancia
        print "Orden en que atendera las peticiones <br/><br/>" ;
        if ($pet->lonB1 > 0) {
            ordenarPeticionesDeBajada($pet->arrayBaja1);
        }
        if ($pet->lonS1 > 0) {
            ordenarPeticionesDeSubida($pet->arraySube1);
        }
        if ($pet->lonB2 > 0) {
            ordenarPeticionesDeBajada($pet->arrayBaja2);
        }  

        print("<br/><br/> pisos en los que se detendra el elevador: <br/><br/> ");

        if ($pet->lonB1 > 0) {
            ordenarPisosDeBajada($pet->arrayBaja1); 
        }
        if ($pet->lonS1 > 0) {
            ordenarPisosDeSubida($pet->arraySube1);
        }
        if ($pet->lonB2 > 0) {
            ordenarPisosDeBajada($pet->arrayBaja2);
        }

        break;
}



function ordenarPeticionesDeSubida($arraySube1)
{
    $lonS1 = count($arraySube1);
    $maxO = (max($arraySube1)+1);
    $maxD = 0;
    $comprobS1 = max($arraySube1);
    $indS1 = 0;
    while ($comprobS1>0) {
        for ($i=0; $i<$lonS1; $i++) {
            if ($arraySube1[$i] > 0 && $arraySube1[$i] < $maxO ){
                $maxO = $arraySube1[$i];
                $maxD = $arraySube1[$i+1];
                $indS1 = $i;
            }
            $i++;
        }
        print "origen: " . $maxO . " destino:" . $maxD . "<br/>" ;
        $arraySube1[$indS1] = 0;
        $arraySube1[$indS1+1] = 0;
        $maxO = (max($arraySube1)+1);
        $maxD = 0;
        $comprobS1 = max($arraySube1);
    }
    
    
}

function ordenarPeticionesDeBajada($arrayBaja1)
{
    $lonB1 = count($arrayBaja1);
    $maxO = 0;
    $maxD = 0;
    $comprobB1 = max($arrayBaja1);
    $indB1 = 0;
    while ($comprobB1>0) {
        for ($i=0; $i<$lonB1; $i++) {
            if ($arrayBaja1[$i] > 0 && $arrayBaja1[$i] > $maxO) {
                $maxO = $arrayBaja1[$i];
                $maxD = $arrayBaja1[$i+1];
                $indB1 = $i;
            }
            $i++;
        }
        print "origen: " . $maxO . " destino:" . $maxD . "<br/>" ;
        $arrayBaja1[$indB1] = 0;
        $arrayBaja1[$indB1+1] = 0;
        $maxO = 0;
        $maxD = 0;
        $comprobB1 = max($arrayBaja1);
    }
}

function ordenarPisosDeSubida($arraySube1R)
{
    $lonS1R = count($arraySube1R);
        if($lonS1R>0) {
            $pisoMenor = (max($arraySube1R)+1);
            $comprobS1R = max($arraySube1R);
            $indS1R = 0;
            while($comprobS1R>0){
                for($i=0; $i<$lonS1R; $i++){
                    if($arraySube1R[$i] > 0 && $arraySube1R[$i] < $pisoMenor ){
                        $pisoMenor = $arraySube1R[$i];
                        $indS1R = $i;
                    }
                }
                $m = $indS1R % 2 ;
                if($m == 0) {
                    print "se detuvo en piso: " . $pisoMenor . " para RECOGER gente<br/>" ;
                } else {
                    print "se detuvo en piso: " . $pisoMenor . " para BAJAR gente<br/>" ;
                }

                $arraySube1R[$indS1R] = 0;
                $pisoMenor = (max($arraySube1R)+1);
                $comprobS1R = max($arraySube1R);
            }  
        }
}

function ordenarPisosDeBajada($arrayBaja1R)
{
    $lonB1R = count($arrayBaja1R);
    if($lonB1R>0) {
        $pisoMenor = 0;
        $comprobB1R = max($arrayBaja1R);
        $indB1R = 0;
        while($comprobB1R>0){
            for($i=0; $i<$lonB1R; $i++){
                if($arrayBaja1R[$i] > 0 && $arrayBaja1R[$i] > $pisoMenor ){
                    $pisoMenor = $arrayBaja1R[$i];
                    $indB1R = $i;
                }
            }
            $m = $indB1R % 2 ;
            if($m == 0) {
                print "se detuvo en piso: " . $pisoMenor . " para RECOGER gente<br/>" ;
            } else {
                print "se detuvo en piso: " . $pisoMenor . " para BAJAR gente<br/>" ;
            }

            $arrayBaja1R[$indB1R] = 0;
            $pisoMenor = 0;
            $comprobB1R = max($arrayBaja1R);
        } 
    }
}





?>