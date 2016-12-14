<?php
	namespace lcgo\init;

	/**
	* Configura tudo
	*/
	abstract class Boostrap{
		private $routes;

		/**
		* Construtor da classe
		*/
		public function __construct(){
			$this->initRoutes();
			$this->run($this->getUrl());
		}

		/**
		* Inicializando as rotas
		*/
		abstract protected function initRoutes();

		/**
		* Adicionando rotas ao array de rotas
		* @parm $route String
		* @parm $controller String
		* @parm $action String
		*/
		protected function addRoute($route,$controller,$action){
			$route = '/'.$route;
			$this->routes[] = array('route' => $route, 'controller'=>$controller,'action'=>$action);
		}


		
		/**
		* Pegando a url digitada
		* @return string
		*/
		public function getUrl(){
			return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		}

		/**
		* Função para varrer o array atras da route
		* @parm $url String
		*/
		protected function run($url){
			$ar = explode('/p/', $url);
			array_walk($this->routes, function($routes) use($ar){
				$aux = explode('/p/', $routes['route']);
				if($aux[0]==$ar[0]){
					$class = "app\\controllers\\".ucfirst($routes['controller']);
					$controller = new $class;
					if(isset($ar[1])){
						$parm = explode('/', $ar[1]);
						$controller->$routes['action']($parm);
					} else {
						$controller->$routes['action']();
					}
					
				}			
			});	
			//$rs = explode('/',filter_var(rtrim($url,'/'),FILTER_SANITIZE_URL));
		}
	}