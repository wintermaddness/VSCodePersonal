<?php

class Calculadora {

    public $numero1;
    public $numero2;

    public function getNumero1() {
        return $this->numero1;
    }

    public function getNumero2() {
        return $this->numero2;
    }

    public function setNumero1($numero1) {
        $this->numero1 = $numero1;
    }

    public function setNumero2($numero2) {
        $this->numero2 = $numero2;
    }

    public function Sumar() {
        echo $this->getNumero1() . " + " . $this->getNumero2() . " = ";
        echo $total = $this->getNumero1() + $this->getNumero2();
    }

    public function Restar() {
        echo $this->getNumero1() . " - " . $this->getNumero2() . " = ";
        echo $total = $this->getNumero1() - $this->getNumero2();
    }

    public function Multiplicar() {
        echo $this->getNumero1() . " x " . $this->getNumero2() . " = ";
        echo $total = $this->getNumero1() * $this->getNumero2();
    }

    public function Dividir() {
        if ($this->getNumero2() == 0) {
            echo 'ERROR. No se puede dividir entre ceros.';
        } else {
            echo $this->getNumero1() . " / " . $this->getNumero2() . " = ";
            echo $total = $this->getNumero1() / $this->getNumero2();
        }
    }
}