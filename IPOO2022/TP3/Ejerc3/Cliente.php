<?php
class Cliente extends Persona {
	private $numCliente;

    //Métodos de acceso
    public function getNumCliente() {
		return $this->numCliente;
	}
	public function setNumCliente($numCliente) {
		$this->numCliente = $numCliente;
	}
	
    //Métodos
    public function __construct($nombre, $apellido, $documento, $numCliente) {
		parent::__construct($nombre, $apellido, $documento);
		$this->numCliente = $numCliente;
	}

	public function __toString(){
		return $this->getNumCliente()."\n".parent::__toString();
	}
}