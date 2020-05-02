<?php
	class producto{
		private $ID;
		private $Nombre;
		private $Precio;
		private $Descripcion;
		private $Imagen;
 
		function __construct(){}
 
		public function getNombre(){
		return $this->Nombre;
		}
 
		public function setNombre($Nombre){
			$this->Nombre = $Nombre;
		}
 
		public function getPrecio(){
			return $this->Precio;
		}
 
		public function setPrecio($Precio){
			$this->Precio = $Precio;
		}
		public function getID(){
			return $this->ID;
		}
 
		public function setID($ID){
			$this->ID = $ID;
		}
		public function getDescripcion(){
			return $this->Descripcion;
		}
 
		public function setDescripcion($Descripcion){
			$this->Descripcion = $Descripcion;
		}
		public function getImagen(){
			return $this->Imagen;
		}
 
		public function setImagen($Imagen){
			$this->Imagen = $Imagen;
		}
	}
?>