<?php
	class Invoice{
		private $conn;
		private $table = "Invoice";

		public $invoice_id;
		public $invoice_date;
		public $invoice_number;
		public $truck_id;
		public $truck_driver_id;
		public $total_coops;
		public $is_dispatched;
		public $store_id;

                //store name and address for invoice
                public $store_name;
                public $store_addresss;

		public function __construct($db){
			$this->conn = $db;
		}

		public function getInvoices(){
			$sql = 'select distinct invoice_id, date_format(invoice_date, "%m-%d-%y") as invoice_date, store_name from chickens.Invoice join chickens.Store using (store_id) join chickens.Orders using (invoice_id) order by invoice_id;';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		public function addInvoice(){
			$invoicedate = $this->invoice_date;
			$storeid = $this->store_id;
			$sql = 'insert into chickens.Invoice(invoice_date, store_id) values ("' . $invoicedate . '", ' . $storeid . ");";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		public function getNewID(){
			$sql = "select invoice_id from chickens.Invoice order by invoice_id desc limit 1;";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

               //gets  orders assigned  to the truck driver.
               public function getInvoiceListTD(){

                        $driver_id = $this->truck_driver_id;
                        $sql = "CALL getInvoiceNum('$driver_id')";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute();
                        return $stmt;
                }

              //gets a store information for the invoice.
              public function getInvoiceStoreinfo(){

                    $invoiceID = $this->invoice_id;
                    $sql = "CALL getInvoiceStoreInfo('$invoiceID')";
                    $stmt = $this->conn->prepare( $sql );
                    $stmt->execute();

                    // get retrieved row
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                   // set values to object properties
                   $this->invoice_date = $row['invoice_date'];
                   $this->store_name = $row['store_name'];
                   $this->store_address = $row['store_address'];
              }

             //get invoice details.
              public function getInvoiceDetailsTD(){

                        $invoiceID = $this->invoice_id;
                        $sql = "CALL getorderDetailsTD('$invoiceID')";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->execute();
                        return $stmt;
                }


         }
?>
