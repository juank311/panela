<?php
/* Se crearan los diferentes CRUD de la tabla de categorias de la base de datos, 
mediante una clase que las contenga por medio de metodos o funciones */

//Creacion de la clase contenedora 



class classFormulary
{
    //propiedades que deben ser privadas la conexion y el nombre de la tabla a aplicar en las Querys

    //Conexion a la db
    private $conn;
    //nombre de la tabla 
    private $db_table = "formularios";

    //se debe realizar la conexion a la base de datos por medio de un constructor 
    public function __construct($db)
    {   
       $this->conn = $db;
    }

 
    public function insert($nombre, $email, $telefono, $mensaje)
    {
        //Crear query
        $query = 'INSERT INTO ' . $this->db_table . ' (nombre, email, telefono, mensaje)VALUE(:nombre, :email, :telefono, :mensaje)';           

        //Preparar la sentencia
        $stmt = $this->conn->prepare($query);

        //Limpiar datos
        $this->nombre = htmlspecialchars(strip_tags($nombre));
        $this->email = htmlspecialchars(strip_tags($email));
        $this->telefono = htmlspecialchars(strip_tags($telefono));
        $this->mensaje = htmlspecialchars(strip_tags($mensaje));
        //Vincular parámetro
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":mensaje", $this->mensaje);

        //Ejecutar query
        if($stmt->execute()){
            return true;
        }

        //Si hay error
        printf("Error %s.\n", $stmt->error); 
        return false;          
    }
}

?>