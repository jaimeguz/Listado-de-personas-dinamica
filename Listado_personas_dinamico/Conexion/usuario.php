<?php
    class Usuario{
        public $Nombre;
        public $Apellido;
        public $Email;
        public $Telefono;
        public $TipoUsuario;
        public $Distrito;

        function __construct($n,$a,$e,$t,$tu,$d){
            $this->Nombre = $n;
            $this->Apellido = $a;
            $this->Email = $e;
            $this->Telefono = $t;
            $this->TipoUsuario = $tu;
            $this->Distrito = $d;
        }
    }
?>