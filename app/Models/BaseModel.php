<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class BaseModel extends Database{
    public function __construct()
    {
        parent::__construct();
    }

    


}
