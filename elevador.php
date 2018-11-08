<?php 
class Elevador
{
    public $peticiones=[];
    public $arraySube1 = array();
    public $arrayBaja1 = array();
    public $arraySube2 = array();
    public $arrayBaja2 = array();
    public $actual;
    public $resta;
    public $restaAbsoluta;
    public $restaVieja;
    public $pisoStart;
    public $direccion;
    public $indice;
    public $lonS1;
    public $lonS2;
    public $lonB1;
    public $lonB2;


    function __construct($act, $o1) {
        $this->peticiones = $o1;
        $this->actual = $act;
    }

    public function pisoEmpieza()//funcion para calcular el  piso mas cercano al actual y su indice 
    {
        $this->restaVieja = max($this->peticiones);
        $this->longitud = count($this->peticiones);
        //obtener el piso origen mas cercano al piso this->actual
        for ($i = 0 ; $i < $this->longitud; $i++) {
            $this->resta = ($this->actual - $this->peticiones[$i]);
            $this->restaAbsoluta = abs($this->resta);
            if ($this->restaAbsoluta < $this->restaVieja) {
                $this->restaVieja = $this->restaAbsoluta;
                $this->pisoStart = $this->peticiones[$i];
                $this->indice = $i;
            }
            $i++;
        }
        $this->direccion = ($this->peticiones[$this->indice] - $this->peticiones[$this->indice+1]);
        
        if ($this->direccion > 0) {//baja
            for ($i = 0; $i < $this->longitud; $i++) {
                $this->direccion = ($this->peticiones[$i] - $this->peticiones[$i+1]);
                if ($this->direccion > 0 && $this->peticiones[$i] > $this->actual) {
                    $j = $this->peticiones[$i];
                    $this->arrayBaja2[] = $j;
                    $i++;
                    $j = $this->peticiones[$i];
                    $this->arrayBaja2[] = $j;
                }elseif ($this->direccion > 0 && $this->peticiones[$i] <= $this->actual ) {
                    $j=$this->peticiones[$i];
                    $this->arrayBaja1[] = $j;
                    $i++;
                    $j=$this->peticiones[$i];
                    $this->arrayBaja1[] = $j;
                } elseif ($this->direccion < 0) {
                    $j=$this->peticiones[$i];
                    $this->arraySube1[] = $j;
                    $i++;
                    $j=$this->peticiones[$i];
                    $this->arraySube1[] = $j;
                } 
            }
        }
        $this->direccion = ($this->peticiones[$this->indice] - $this->peticiones[$this->indice+1]);
        if ($this->direccion < 0) {//sube
            for ($i = 0; $i < $this->longitud; $i++) {
                $this->direccion = ($this->peticiones[$i] - $this->peticiones[$i+1]);
                if ($this->direccion < 0 && $this->peticiones[$i] < $this->actual) {
                    $j=$this->peticiones[$i];
                    $this->arraySube2[] = $j;
                    $i++;
                    $j=$this->peticiones[$i];
                    $this->arraySube2[] = $j;
                } elseif ($this->direccion < 0 && $this->peticiones[$i] >= $this->actual) {
                    $j=$this->peticiones[$i];
                    $this->arraySube1[] = $j;
                    $i++;
                    $j=$this->peticiones[$i];
                    $this->arraySube1[] = $j;
                } elseif ($this->direccion > 0 ) {
                    $j=$this->peticiones[$i];
                    $this->arrayBaja1[] = $j;
                    $i++;
                    $j=$this->peticiones[$i];
                    $this->arrayBaja1[] = $j;
                }
            }
        }
        
        $this->direccion = ($this->peticiones[$this->indice] - $this->peticiones[$this->indice+1]);
        
        $this->lonS1 = count($this->arraySube1);
        $this->lonS2 = count($this->arraySube2);
        $this->lonB1 = count($this->arrayBaja1);
        $this->lonB2 = count($this->arrayBaja2);
    }
}


?>