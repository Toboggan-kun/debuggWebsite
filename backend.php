<?php

require "conf.inc.php";
require "functions.php";

class Backend{

	private $surround ='p';
	public $user;
	private $cnt = 0;
	public $exec;

	public function __construct(){


	}
	private function surround($html){
		return "<{$this->surround}>{$html}</$this->surround}>";
	}
	public function getUserDataFromDataBase(){

		$db = new DataBase();
		$db->connectDataBase();

		$db->prepareQuery("SELECT * FROM user WHERE isAdmin = :isAdmin");
		$this->exec = $db->executeQuery(['isAdmin' => 0]);
		var_dump($this->exec);
		return $this->exec;
	}

	public function displayContent($array = array(), $nameIndex){
		$this->user = $array;
		var_dump($this->user);
		if($this->cnt == 0){
			$this->cnt++;
			return $this->surround('<tr><th>' . $this->user[$nameIndex] . '</th>');
		}else if($this->cnt > 0 && $this->cnt != 4){
			$this->cnt++;
			return $this->surround('<th>' . $this->user[$nameIndex] . '</th>');
		}else if($this->cnt == 4){
			$this->cnt = 0;
			return $this->surround('<th>' . $this->user[$nameIndex] . '</th></tr>');
		}

	}


}

?>
