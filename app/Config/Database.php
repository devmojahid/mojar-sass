<?php 
namespace App\Config;
use PDO;
use PDOException;

// class Database{
//     public $host     = 'localhost';
//     private $db_name  = 'mojar_sass';
//     private $username = 'root';
//     private $password = ''; 
//     public $conn;

//     public function __construct()
//     {
//         $this->conn = null;
//         try {
//             $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username,$this->password);
//             // set the PDO error mode to exception
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
//         } catch (PDOException $e) {
//             echo "Connection Faild: {$e->getMessage()}";
//         }
//     }

//     public function somthing(){
//         try {
//             $stmt = $this->conn->prepare("SELECT * FROM `user`");
//             $stmt->execute();
//             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//             echo '<pre>';
//             print_r($result);
//             echo '</pre>';

//             echo "somthing";
//         } catch (PDOException $e) {
//             echo "Connection Faild: {$e->getMessage()}";
//         }
//     }
// }   


class Database {
    public $host = 'localhost';
    private $db_name = 'mojar_sass';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed: {$e->getMessage()}";
        }
    }

    public function something() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM `user`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<pre>';
            print_r($result);
            echo '</pre>';

            echo "something";
        } catch (PDOException $e) {
            echo "Query Failed: {$e->getMessage()}";
        }
    }
}

