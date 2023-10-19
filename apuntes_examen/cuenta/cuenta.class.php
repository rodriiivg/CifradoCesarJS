<?php
class  Cuenta { //DEBERIA SER ABSTRACT
    protected $numero;
    protected $titular;
    protected $saldo;
    public function __construct($numero, $titular, $saldo) {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;

    }
    public function ingreso($cantidad) {
        $nuevoSaldo = $this->saldo + $cantidad;
        $this->saldo = $nuevoSaldo;
    }

    public function reintegro($cantidad) {
        $nuevoSaldo = $this->saldo - $cantidad;
        $this->saldo = $nuevoSaldo;
    }

    //REVISAR ESTE (POCHO)
    public function esPreferencial($cantidad) {
       /*
        if($this->saldo > $cantidad){
            return true;
            
        }
        else{
            return false;
        }
        */
        return $this->saldo > $cantidad;
          //añadir return true || false o comprobarwue funcione


    }

    public function __toString(){
        return $this->saldo . " " . $this->numero.  " " . $this->titular;
    }

    
}
?>