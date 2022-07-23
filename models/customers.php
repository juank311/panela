<?php


class classCustomers

{
    //propiedades que deben ser privadas la conexion y el nombre de la tabla a aplicar en las Querys

    //Conexion a la db
    private $conn;
    //nombre de la tabla 
    private $db_table = "clientes";

    //se debe realizar la conexion a la base de datos por medio de un constructor 
    public function __construct($db)
    {   //
        $this->conn = $db;
    }
    //Query de lectura general
    public function search()
    {   
        $query_search = 'SELECT  * FROM '. $this->db_table;
        $stmt_search = $this->conn->query($query_search);
        $stmt_search->execute();
        $table_result_search = $stmt_search->fetchAll(PDO::FETCH_OBJ);
        return $table_result_search;
    }

    //query de lectura individual 
    public function search_one($id)
    {   //
        $query_search = 'SELECT  * FROM '. $this->db_table. ' WHERE id = :id';
        $stmt_search = $this->conn->prepare($query_search);
        $stmt_search->bindParam(':id', $id);
        $stmt_search->execute();
        $table_result_search = $stmt_search->fetch(PDO::FETCH_OBJ);
        return $table_result_search;

     
    }

    //query para insertan a base de datos 
    public function insert($nombre, $telefono, $documento, $correo, $direccion, $USUARIOS_id)
    {   //ojo
        $query_insert = 'INSERT INTO ' . $this->db_table . ' (nombre, telefono, documento, correo, direccion, USUARIOS_id) 
        VALUES (:nombre, :telefono, :documento, :correo, :direccion, :USUARIOS_id)';
        $stmt_insert = $this->conn->prepare($query_insert);

        //validacion de input con dato
        $nombre = htmlspecialchars(strip_tags($nombre));
        $telefono = htmlspecialchars(strip_tags($telefono));
        $documento = htmlspecialchars(strip_tags($documento));
        $correo = htmlspecialchars(strip_tags($correo));
        $direccion = htmlspecialchars(strip_tags($direccion));
        $USUARIOS_ID = htmlspecialchars(strip_tags($USUARIOS_id));
        
        //Vincular el parametro que viene del input 
        $stmt_insert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_insert->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt_insert->bindParam(':documento', $documento, PDO::PARAM_STR);
        $stmt_insert->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt_insert->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt_insert->bindParam(':USUARIOS_id', $USUARIOS_id, PDO::PARAM_INT);

        //Si se escucja la queri insertar y devolver  un true 
        if ($stmt_insert->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //METODO ACTUALIZAR 
    public function update($id, $nombre, $telefono, $documento, $correo, $direccion)
    {   
        $query_update = 'UPDATE ' . $this->db_table . ' SET nombre = :nombre, telefono = :telefono, documento = :documento, correo = :correo, direccion = :direccion WHERE id = :id';
        $stmt_update = $this->conn->prepare($query_update);

         //validacion de input con dato
         $nombre = htmlspecialchars(strip_tags($nombre));
         $telefono = htmlspecialchars(strip_tags($telefono));
         $documento = htmlspecialchars(strip_tags($documento));
         $correo = htmlspecialchars(strip_tags($correo));
         $direccion = htmlspecialchars(strip_tags($direccion));
         
         
         //Vincular el parametro que viene del input 
         $stmt_update->bindParam(':id', $id);
         $stmt_update->bindParam(':nombre', $nombre, PDO::PARAM_STR);
         $stmt_update->bindParam(':telefono', $telefono, PDO::PARAM_STR);
         $stmt_update->bindParam(':documento', $documento, PDO::PARAM_STR);
         $stmt_update->bindParam(':correo', $correo, PDO::PARAM_STR);
         $stmt_update->bindParam(':direccion', $direccion, PDO::PARAM_STR);
         
 
         //Si se escucja la queri insertar y devolver  un true 
         if ($stmt_update->execute()) {
             return true;
         } else {
             
             return false;
         }
    }

    //METODO DELETE BORRAR 
    public function delete($id)
    {   //ojo
        $query_delete = 'DELETE FROM ' . $this->db_table . ' WHERE id = :id';
        $stmt_delete = $this->conn->prepare($query_delete);

        //validacion de input con dato
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Vincular el parametro que viene del input 
        $stmt_delete->bindParam(':id', $id, PDO::PARAM_INT);


        //Si se escucja la queri deletear y devolver   true 
        if ($stmt_delete->execute()) {
            return true;
        } else {
            //preguntas a GIAN
            //printf("Error $s.\n", $stmt_delete->error); 
            return false;
        }
    }
}
