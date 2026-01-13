<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {
        $users = [
            ['name' => 'Maria', 'email' => 'maria@example.com'],
            ['name' => 'Juan', 'email' => 'juan@example.com'],
        ];

        return view('users.index', ['users' => $users]);
    }
}
