<?php
abstract class cuentaAhorro extends cuenta{

    protected $numero;
    protected $titular;
    protected $saldo;
    protected $comisionApertura;
    protected $intereses;
    public function __construct($numero, $titular, $saldo, $comisionApertura, $intereses) {
        parent::__construct($numero, $titular, $saldo) ;
     
        $this->comisionApertura = $comisionApertura;
        $this->intereses = $intereses;

    }
    public function aplicaInteres($intereses) {
        $nuevoSaldo = $this->saldo + $intereses;
        $this->saldo = $nuevoSaldo;
        
    }
    public function __toString(){
        parent::__toString() ; //REVISAR EL PARENT Y COMO LLAMARLO //IMPORTANTE!!!!
        return $this->saldo . " " . $this->numero.  " " . $this->titular. " " . $this->comisionApertura . " " . $this->intereses;
    }

}

?>
