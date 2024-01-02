<?php
namespace App\Http\Controllers;

use App\Models\User;

class AuthController
{
    public function index(){
        User::select("users");
    }
}