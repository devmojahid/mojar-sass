<?php 
namespace App\Config;
use PDO;
use PDOException;
use Exception;

class Database{
    public $host     = 'localhost';
    private $db_name  = 'mojar_sass';
    private $username = 'root';
    private $password = ''; 
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username,$this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Faild: {$e->getMessage()}";
        }
    }

    public function select($table,$where=null,$order=null,$limit=null){
       try {
        
        $sql = "SELECT * FROM $table";
        if($where != null){
            $sql .= " WHERE $where";
        }
        if($order != null){
            $sql .= " ORDER BY $order";
        }
        if($limit != null){
            $sql .= " LIMIT $limit";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
              echo "Select Query Faild: {$e->getMessage()}";
       }
    }

    public function query($sql){
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Query Faild: {$e->getMessage()}";
        }
    }       















    // public function somthing(){
    //     try {
    //         $stmt = $this->conn->prepare("SELECT * FROM `users`");
    //         $stmt->execute();
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //         echo '<pre>';
    //         print_r($result);
    //         echo '</pre>';

    //         echo "somthing";
    //     } catch (PDOException $e) {
    //         echo "Connection Faild: {$e->getMessage()}";
    //     }
    // }

    // public function insert($table,$data){
    //     $keys = implode(",",array_keys($data));
    //     $values = implode("','",array_values($data));
    //     $sql = "INSERT INTO $table ($keys) VALUES ('$values')";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $this->conn->lastInsertId();
    // }

    // public function update($table,$data,$where){
    //     $keys = implode(",",array_keys($data));
    //     $values = implode("','",array_values($data));
    //     $sql = "UPDATE $table SET $keys = '$values' WHERE $where";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->rowCount();
    // }

    // public function delete($table,$where){
    //     $sql = "DELETE FROM $table WHERE $where";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->rowCount();
    // }

    // public function select($table,$where=null,$order=null,$limit=null){
    //     $sql = "SELECT * FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     if($order != null){
    //         $sql .= " ORDER BY $order";
    //     }
    //     if($limit != null){
    //         $sql .= " LIMIT $limit";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function selectOne($table,$where=null,$order=null){
    //     $sql = "SELECT * FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     if($order != null){
    //         $sql .= " ORDER BY $order";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function selectRaw($sql){
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function selectOneRaw($sql){
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function count($table,$where=null){
    //     $sql = "SELECT COUNT(*) FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchColumn();
    // }

    // public function sum($table,$column,$where=null){
    //     $sql = "SELECT SUM($column) FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchColumn();
    // }

    // public function avg($table,$column,$where=null){
    //     $sql = "SELECT AVG($column) FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchColumn();
    // }

    // public function max($table,$column,$where=null){
    //     $sql = "SELECT MAX($column) FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchColumn();
    // }

    // public function min($table,$column,$where=null){
    //     $sql = "SELECT MIN($column) FROM $table";
    //     if($where != null){
    //         $sql .= " WHERE $where";
    //     }
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchColumn();
    // }

    // public function query($sql){
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->rowCount();
    // }

    // public function raw($sql){
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function rawOne($sql){
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function lastInsertId(){
    //     return $this->conn->lastInsertId();
    // }

    // public function beginTransaction(){
    //     return $this->conn->beginTransaction();
    // }

    // public function commit(){
    //     return $this->conn->commit();
    // }

    // public function rollBack(){
    //     return $this->conn->rollBack();
    // }

    // public function close(){
    //     return $this->conn = null;
    // }
    
}   