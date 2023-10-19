<?php

abstract class cuentaCorriente extends cuenta {
 
protected $minimoParaReintegro = 20;
    protected $cuentaMantenimiento;

    public function __construct($numero, $titular, $saldo, $cuentaMantenimiento) {
        parent::__construct($numero, $titular, $saldo) ;
        $this->cuentaMantenimiento = $cuentaMantenimiento;
        
    }
    public function reintegro($cantidad) {
        if($this->saldo-$cantidad > $this->minimoParaReintegro) { //if($this->saldo > $this->minimoParaReintegro)
            //if($this->saldo-$cantidad > 20) {
        $nuevoSaldo = $this->saldo - $cantidad;
        $this->saldo = $nuevoSaldo;
        }
        else {
            echo "<strong>NO SE PUEDE SACAR DINERO SI EL SALDO ES MENOR A 20</strong>";
        }
    }
    public function __toString(){
        parent::__toString() ; //REVISAR EL PARENT Y COMO LLAMARLO //IMPORTANTE!!!!
        return $this->saldo . " " . $this->numero.  " " . $this->titular. " " . $this->cuentaMantenimiento;
    }
}
?>