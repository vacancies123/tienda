<?php
// incluye la clase Db
require_once('conexion.php');
 
	class CrudTienda{
		// constructor de la clase
		public function __construct(){}
 
		// método para insertar, recibe como parámetro un objeto de tipo libro
		public function insertar($producto){
			$db=Db::conectar();
			$insert=$db->prepare('INSERT INTO productos values(NULL,:Nombre,:Precio,:Descripcion,:Imagen)');
			$insert->bindValue('Nombre',$producto->getNombre());
			$insert->bindValue('Precio',$producto->getPrecio());
			$insert->bindValue('Descripcion',$producto->getDescripcion());
			$insert->bindValue('Imagen',$producto->getImagen());
			$insert->execute();
 
		}
 
		// método para mostrar todos los libros
		public function mostrar(){
			$db=Db::conectar();
			$listaproductos=[];
			$select=$db->query('SELECT * FROM productos');
 
			foreach($select->fetchAll() as $producto){
				$myproducto= new producto();
				$myproducto->setID($producto['ID']);
				$myproducto->setNombre($producto['Nombre']);
				$myproducto->setPrecio($producto['Precio']);
				$myproducto->setDescripcion($producto['Descripcion']);
				$myproducto->setImagen($producto['Imagen']);
				$listaproductos[]=$myproducto;
			}
			return $listaproductos;
		}
 
		// método para eliminar un libro, recibe como parámetro el id del libro
		public function eliminar($ID){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM productos WHERE ID=:ID');
			$eliminar->bindValue('ID',$ID);
			$eliminar->execute();
		}
 
		// método para buscar un libro, recibe como parámetro el id del libro
		public function obtenerProducto($ID){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM productos WHERE ID=:ID');
			$select->bindValue('ID',$ID);
			$select->execute();
			$producto=$select->fetch();
			$myproducto= new producto();
			$myproducto->setId($producto['ID']);
			$myproducto->setNombre($producto['Nombre']);
			$myproducto->setPrecio($producto['Precio']);
			$myproducto->setDescripcion($producto['Descripcion']);
			$myproducto->setImagen($producto['Imagen']);
			return $myproducto;
		}
 
		// método para actualizar un producto, recibe como parámetro el producto
		public function actualizar($producto){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE productos SET Nombre=:Nombre, Precio=:Precio, Descripcion=:Descripcion, Imagen=:Imagen  WHERE ID=:ID');
			$actualizar->bindValue('ID',$producto->getID());
			$actualizar->bindValue('Nombre',$producto->getNombre());
			$actualizar->bindValue('Precio',$producto->getPrecio());
			$actualizar->bindValue('Descripcion',$producto->getDescripcion());
			$actualizar->bindValue('Imagen',$producto->getImagen());
			$actualizar->execute();
		}
	}
?>