<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class BaseModel extends Database{
    public function __construct()
    {
<<<<<<< HEAD
        echo "<br>From Basemodel<br>";

       
=======
        parent::__construct();
>>>>>>> 3bd74839585397ef0c5d0e7e9c708ca341771c17
    }

    


}
