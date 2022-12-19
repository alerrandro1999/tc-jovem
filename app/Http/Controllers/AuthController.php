<?php

namespace App\Http\Controllers;

use App\Models\Membros;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MembroController;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("/")->with('invalido', 'Usuário ou senha inválidos!');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $data = Membros::all();
            $count = Membros::count();
            $ativos = Membros::getAtivos();
            $inativos = Membros::getinativos();
            $aniversarios = Membros::getAniversariantes();
            $countNiver = Membros::getCountAniversariantes();
            $niverDay = Membros::getDayAniversariantes();


            return view('dash', [ 'data'         => $data, 
                                  'count'        => $count,
                                  'ativos'       => $ativos,
                                  'inativos'     => $inativos,
                                  'aniversarios' => $aniversarios,
                                  'countNiver'   => $countNiver,
                                  'niverDay'     => $niverDay]);
        }

        return redirect("/")->with('invalido', 'Você não tem permissão');
    }

    public function signOut()
    {
        Session()->flush();
        Auth::logout();

        return Redirect('/');
    }
}
