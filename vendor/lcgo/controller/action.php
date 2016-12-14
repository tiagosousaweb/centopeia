<?php 
	namespace lcgo\controller;
	/**
	* Classe action
	*/
	class Action 
	{
		protected $view;
		/**
		* Construtor da classe
		*/
		public function __construct(){
			$this->view  = new \stdClass;
		}
		/**
		* Renderizando o template
		*/
		public function render($action){
			$atual = get_class($this);
			$singleClassName = strtolower(str_replace("app\\controllers\\", "", $atual));
			include_once '../app/views/'.$singleClassName.'/'.$action;
		}
	}
