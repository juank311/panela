<?php
   
class classConnection_mysql
{  
    private $host = "localhost";
    private $user_db = "root";
    private $password = "";
    private $db = "panela_db";
    private $conn;
    private $dsn;

    public function connection()
    {
        try{
        //configuracion de la DSN
        $this->dsn = 'mysql:host='.$this->host.';dbname='.$this->db;

        //configuracion de la instancia PDO
        $this->conn = new PDO($this->dsn, $this->user_db, $this->password);       
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Mostrar mensaje si la conexión es correcta
        if($this->conn){
        echo "Conectado a la base  correctamente!"; 
        //echo "\n";
        }
        }catch (PDOException $e){
        //Si hay error en la conexión mostrarlo
        echo $e->getMessage();
        }
        return $this->conn;
    }
}