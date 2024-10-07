<?php

    class Usuario{

        private $db;

        public function __construct($host, $user, $password, $dbname){
            $this->db = new mysqli($host, $user, $password, $dbname);
            if($this->db->connect_error){
                throw new Exception("Conxión Faliida: " . $this->db->connect_error);
            }
        }


        public function register($nombre, $email, $password) {
            try {
                $query = "SELECT id FROM usuario WHERE email = ?";
                $stmt = $this->db->prepare($query);
                if ($stmt === false) {
                    throw new Exception("Error al preparar la sentencia: " . $this->db->error);
                }
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                
                if ($stmt->num_rows > 0) {
                    $stmt->close();
                    return '<script>alert("El correo electrónico ya está registrado.")'; // Mensaje para el usuario
                }
                $stmt->close(); 
        
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
               
                $stmt = $this->db->prepare("INSERT INTO usuario (nombre, email, contraseña) VALUES (?, ?, ?)");
                if ($stmt === false) {
                    throw new Exception("Error al preparar la sentencia: " . $this->db->error);
                }
        
                $stmt->bind_param("sss", $nombre, $email, $passwordHash);
        
                if ($stmt->execute()) {
                    $stmt->close();
                    header("Location: ../index.php");
                } else {
                    $stmt->close();
                    throw new Exception("Error al ejecutar la sentencia: " . $stmt->error);
                }
            } catch (Exception $e) {
                error_log($e->getMessage()); // Registrar el error en el log
                return "Error en el registro.";
            }
        }
        
        

        public function login($email, $password) {
            $stmt = $this->db->prepare("SELECT email, contraseña FROM usuario WHERE email = ?");
            if ($stmt === false) {
                throw new Exception("Error al preparar la sentencia: " . $this->db->error);
            }
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
        
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $passwordHash);
                $stmt->fetch();
        
                if (password_verify($password, $passwordHash)) {
                    $stmt->close();
                    return ['id' => $id];
                } else {
                    $stmt->close();
                    return false;
                }
            } else {
                $stmt->close();
                return false;
            }
        }

        public function cerrarSesion() {
            session_start();
            session_destroy();
        }        

    }

?>