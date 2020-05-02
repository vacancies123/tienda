
<?php
	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion= new PDO('mysql:host=localhost;dbname=id12791729_libros','id12791729_jose2','-*~>)3Tb7R/=zV7x',$pdo_options);
			return self::$conexion;
		}		
	} 
?>