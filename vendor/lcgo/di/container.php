<?php
	namespace lcgo\di;
	/**
	* Class container, gerenciar dependencias
	*/
	class Container{	
		public static function getClass($class){
			$nclass = "\\app\\models\\".ucfirst($class);
			return new $nclass(\app\Init::getDb());
		}
	}