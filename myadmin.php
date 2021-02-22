<?php 

	Class Database{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db;
		private $conn;

		public function __construct($database){
			
			try {
				$this->db=$database;
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insert($table, $data){


			$query = "INSERT INTO $table (naziv,produkcija,trajanje,zanr) VALUES ('$data[naziv]','$data[produkcija]','$data[trajanje]','$data[zanr]')";
			
			if ($sql = $this->conn->query($query)) {
				echo "<script>alert('Dodali ste film');</script>";
				echo "<script>window.location.href = 'filmovi.php';</script>";
			}else{
				echo "<script>alert('Neuspesno');</script>";
				echo "<script>window.location.href = 'filmovi.php';</script>";
			}

		}           

		public function fetch(){ /*prikaz svih*/ 
			$data = null;

			$query = "SELECT * , z.nazivZanra FROM filmovi f LEFT JOIN zanr z on (f.zanr=z.id)
                       GROUP BY f.ID 
                       ORDER BY f.ID DESC";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($table, $id, $id_value){

			$query="DELETE FROM $table WHERE $table.$id=$id_value";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
            }
            
        }
    

		public function edit($table, $id){

			$data = null;

			$query = "SELECT * FROM $table WHERE ID = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($table, $data){

			$query = "UPDATE $table SET naziv='$data[naziv]', produkcija='$data[produkcija]', trajanje='$data[trajanje]', zanr='$data[zanr]' WHERE ID='$data[ID] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>