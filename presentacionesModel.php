<?php
    
    class presentaciones{

        private $server = "localhost";
        private $username = "root";
        private $password;
        private $db = "convoy";
        private $conn;

        public function __construct(){
            try {
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
            } catch (Exception $e) {
                echo "connection failed" . $e->getMessage();
            }    
        }
        
        public function agregar_presentacion(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['descripcion'])){
					if (!empty($_POST['descripcion'])){
						
						$descripcion = $_POST['descripcion'];
						

						$query = "INSERT INTO presentaciones (descripcion) VALUES ('$descripcion')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('presentacion agregada correctamente');</script>";
							echo "<script>window.location.href = 'vista_presentaciones.php';</script>";
						}else{
							echo "<script>alert('Fallo al agregar la presentacion');</script>";
							echo "<script>window.location.href = 'vista_presentaciones.php';</script>";
						}

					}else{
						echo "<script>alert('vacio');</script>";
						echo "<script>window.location.href = 'vsta_presentaciones.php';</script>";
					}
				}
			}
		}

        public function buscar_presentacion(){
			$data = null;

			$query = "SELECT * FROM presentaciones";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
        }
        
        public function eleminar_presentacion($id){

			$query = "DELETE FROM presentaciones where presentacion_id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
        }
        
        public function busqueda_simple($id){

			$data = null;

			$query = "SELECT * FROM presentaciones WHERE presentacion_id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
        }
        
        public function editar_presentacion($id){

			$data = null;

			$query = "SELECT * FROM presentaciones WHERE presentacion_id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

        public function actualizar_presentacion($data){

			$query = "UPDATE presentaciones SET descripcion='$data[descripcion]' WHERE presentacion_id='$data[presentacion_id]'";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
        


    }





?>