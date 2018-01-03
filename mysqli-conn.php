<?php
	class DBConn {
		private $server_name = "localhost";
		private $user_name = "root";
		private $password = "";
		private $db_conn;

		public function __construct() {
			$this->db_conn = new mysqli($this->server_name, $this->user_name, $this->password, "yout");
			$this->db_conn->set_charset("utf8");
	    }

		public function query($sql) {
			return $this->db_conn->query($sql);
		}

		public function mysqli_real_escape_string($text) {
			return $this->db_conn->real_escape_string($text);
		}

		public function close() {
			$this->db_conn->close();
		}
		public function affected_rows() {
			return $this->db_conn->affected_rows;
		}
		public function insert_id() {
			return $this->db_conn->insert_id;
		}
		public function error() {
			return $this->db_conn->error;
		}
	}
?>