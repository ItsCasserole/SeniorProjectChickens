<?php
	class Order{
		private $conn;
		private $table = "Orders";

		//Table attributes
		public $order_id;
		public $delivery_date;
		public $number_coops;
		public $store_id;
		public $flock_id;
		public $store_name;
		public $flock_name;

		//DB Connect
		public function __construct($db){
			$this->conn = $db;
		}

		public function getStores(){
			$sql = "call selectActiveStore();";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		public function getBird(){
			$sql = "call selectBird();";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		public function getCurrentOrders(){
			$sql = "call getCurrentOrders();";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		public function insertOrder(){
			$storeid = $this->store_id;
			$flockid = $this->flock_id;
			$deldate = $this->delivery_date;
			$numcoops = $this->number_coops;
			$sql = "call addOrder(" . $numcoops . ', "' . $deldate . '", ' . $storeid . ", " . $flockid . ");";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		public function removeOrder(){
			$id = $this->order_id;
			$sql = "call removeOrder(" . $id . ");";
			$stmt = $this->conn->prepare($sql);
			return $stmt;
		}
	}

?>
