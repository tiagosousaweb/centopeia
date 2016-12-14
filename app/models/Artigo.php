<?php
	namespace app\models;
	/**
	* Classe do artigo
	*/
	class Artigo{
		
		protected $db;

		public function __construct(\PDO $_db){
			$this->db = $_db;
		}

		public function all(){
			$sql = "SELECT * FROM user";
			return $this->db->query($sql);
		}
	}