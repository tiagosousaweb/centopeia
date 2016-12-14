<?php
	namespace app\controllers;
	use lcgo\controller\Action;
	use lcgo\di\Container;
	/**
	* Controller Index
	*/
	class Index extends Action{
		
		public function sobre($parm){
			include '../app/views/index/sobre.phtml';
			foreach ($parm as $key => $value) {
				echo "<br>".$value;
			}
		}

		public function contato(){
			include '../app/views/index/contato.phtml';
		}

		public function teste($parm){
			include '../app/views/index/contato.phtml';
			echo $parm[0];
		}

		public function index(){
			$artigos = Container::getClass("Artigo");

			$lista_artigos = $artigos->all();

			$this->view->ds = $lista_artigos;

			$this->render('index.phtml');
		}
	}