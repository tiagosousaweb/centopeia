<?php
	namespace app;
	use lcgo\init\Boostrap;
	/**
	* Classe de inicialização do sistema
	*/
	class Init extends Boostrap {
		/**
		* Inicializando as rotas
		*/
		protected function initRoutes(){
			$this->addRoute('','Index','index');
			$this->addRoute('sobre/p/','Index','sobre');
			$this->addRoute('contato','Index','contato');
			$this->addRoute('teste/p/','Index','teste');
		}
		/**
		* Criando conexão com o banco de dados
		*/
		public static function getDb(){
			try{
				$db = new \PDO("mysql:host=localhost;dbname=db_estudo","root","");
				return $db;
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}