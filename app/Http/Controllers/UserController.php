<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('USER/index', ['tittle' => ' ', 'name' => 'Chalifahdien Hamud']);
    }

    public function adminview()
    {
        $pengguna = User::all();
        return response()->json($pengguna);
    }
}
