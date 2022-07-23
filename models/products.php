<?php


class classProducts

{
    //propiedades que deben ser privadas la conexion y el nombre de la tabla a aplicar en las Querys

    //Conexion a la db
    private $conn;
    //nombre de la tabla 
    private $db_table = "products";

    //propiedades que deben ser publicas: las variables que contiene la tabla 
    public $id;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $tipo;
    public $valor;
    //public $USUARIOS_id;


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
    public function insert($nombre, $descripcion, $cantidad, $tipo, $valor, $USUARIOS_ID)
    {   //ojo
        $query_insert = 'INSERT INTO ' . $this->db_table . ' (nombre, descripcion, cantidad, tipo, valor, USUARIOS_ID) 
        VALUES (:nombre, :descripcion, :cantidad, :tipo, :valor, :USUARIOS_ID)';
        $stmt_insert = $this->conn->prepare($query_insert);

        //validacion de input con dato
        $nombre = htmlspecialchars(strip_tags($nombre));
        $descripcion = htmlspecialchars(strip_tags($descripcion));
        $cantidad = htmlspecialchars(strip_tags($cantidad));
        $tipo = htmlspecialchars(strip_tags($tipo));
        $valor = htmlspecialchars(strip_tags($valor));
        $USUARIOS_ID = htmlspecialchars(strip_tags($USUARIOS_ID));
        
        //Vincular el parametro que viene del input 
        $stmt_insert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_insert->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt_insert->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        $stmt_insert->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt_insert->bindParam(':valor', $valor, PDO::PARAM_STR);
        $stmt_insert->bindParam(':USUARIOS_ID', $USUARIOS_ID, PDO::PARAM_STR);

        //Si se escucja la queri insertar y devolver  un true 
        if ($stmt_insert->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //METODO ACTUALIZAR 
    public function update($id, $nombre, $descripcion, $cantidad, $tipo, $valor)
    {   
        $query_update = 'UPDATE ' . $this->db_table . ' SET nombre = :nombre, descripcion = :descripcion, cantidad = :cantidad, tipo = :tipo, valor = :valor WHERE id = :id';
        $stmt_update = $this->conn->prepare($query_update);

         //validacion de input con dato
         $nombre = htmlspecialchars(strip_tags($nombre));
         $descripcion = htmlspecialchars(strip_tags($descripcion));
         $cantidad = htmlspecialchars(strip_tags($cantidad));
         $tipo = htmlspecialchars(strip_tags($tipo));
         $valor = htmlspecialchars(strip_tags($valor));
         
         
         //Vincular el parametro que viene del input 
         $stmt_update->bindParam(':id', $id);
         $stmt_update->bindParam(':nombre', $nombre, PDO::PARAM_STR);
         $stmt_update->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
         $stmt_update->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
         $stmt_update->bindParam(':tipo', $tipo, PDO::PARAM_STR);
         $stmt_update->bindParam(':valor', $valor, PDO::PARAM_STR);
         
 
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
