<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembroController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('cadastro');
        }
        return redirect("/")->with('invalido','Você não tem permissão');
    }
}
