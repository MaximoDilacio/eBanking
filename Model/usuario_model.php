<?php
require "database.php";

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    

    public function login($email, $password){
        if (!empty($email) && !empty($password)){
            
            $stmt = $this->pdo->prepare('SELECT * FROM usuario WHERE Gmail = :email');
            $stmt->execute(['email' => $email]);

            if ($stmt === false) {
                throw new Exception("Error al preparar la sentencia: " . implode(":", $this->db->errorInfo()));
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($user) {
                if (password_verify($password, $user['Contrasena'])) {
                    return $user;
                } else {
                    echo 'La contraseña no es correcta';
                    return false;
                }
            } else {
                echo 'El usuario no existe';
                return false;
            }

        } else {
            echo 'Error: Los campos están vacíos';
        }
    }

        private function generarNumeroCuenta() {
            return str_pad(mt_rand(0, 99999999), 8 , '0' , STR_PAD_LEFT) ; 
        }
    
    
        private function generarSaldo() {
            return rand(10000, 50000); // Saldo entre 10,000 y 50,000
        }
    
        public function register($nombre, $email, $password) {
            $nombreValid = "/^[a-zA-Z\s]+$/";
        
            if (!empty($nombre) && !empty($password) && !empty($email)) {
                if (preg_match($nombreValid, $nombre) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
                    // Inserción de los datos del usuario
                    $stmt = $this->pdo->prepare('INSERT INTO usuario (Nombre, Gmail, Contrasena) VALUES (:nombre, :email, :password)');
        
                    if ($stmt === false) {
                        throw new Exception("Error al preparar la sentencia: " . implode(":", $this->pdo->errorInfo()));
                    }
        
                    // Ejecutar la consulta de usuario
                    $stmt->execute(['nombre' => $nombre, 'email' => $email, 'password' => $passwordHash]);
        
                    // Obtener el ID del usuario recién insertado
                    $userId = $this->pdo->lastInsertId();
        
                    // Generar saldo aleatorio
                    $saldo = $this->generarSaldo(); // Asegúrate de tener esta función
                    // Asignar un valor por defecto a 'Cuenta_fav'
                    $cuentaFav = 0; // O algún valor predeterminado según la lógica de tu aplicación
        
                    // Generar el número de cuenta
                    $numCuenta = $this->generarNumeroCuenta();
        
                    // Inserción de la cuenta asociada al usuario
                    $stmtCuenta = $this->pdo->prepare('INSERT INTO cuenta (Num_Cun, Saldo, Cuenta_fav, id_usuario) VALUES (:numCun, :saldo, :cuentaFav, :userId)');
                    $stmtCuenta->execute(['numCun' => $numCuenta, 'saldo' => $saldo, 'cuentaFav' => $cuentaFav, 'userId' => $userId]);
        
                    return true;
        
                } else {
                    echo 'Los datos ingresados no son válidos';
                    return false;
                }
            }
        }
     
    public function verCuentas(){

        $stmt = $this->pdo->prepare('SELECT Num_Cun, Saldo FROM cuenta WHERE id_usuario = :id_usuario');
        $stmt->execute(['id_usuario' => $_SESSION['user_id']]);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($user){
            return $user;
        }
        else{
            echo $_SESSION['user_id'];
            return false;   
        }
    }  

    }

