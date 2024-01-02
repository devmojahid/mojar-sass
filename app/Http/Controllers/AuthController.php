<?php
namespace App\Http\Controllers;

use App\Models\User;

class AuthController
{
    public function index(){
        var_dump((new User)->select("users"));
        // var_dump((new User)->query("INSERT INTO users (name,email,password) VALUES ('Md. Alamin','mojahid@gmail.com','123456')"));
    }
}