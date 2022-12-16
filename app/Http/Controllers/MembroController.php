<?php

namespace App\Http\Controllers;

use App\Models\Membros;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MembroController extends Controller
{
    public function index()
    {
        $data = Membros::all();

        if (Auth::check()) {
            return view('cadastro', ['data' => $data]);
        }
        return redirect("/")->with('invalido', 'Você não tem permissão');
    }

    public function novoMembro()
    {
        if (Auth::check()) {
            return view('novomembro');
        }
        return redirect("/")->with('invalido', 'Você não tem permissão');
    }

    public function cadastroMembro(Request $request)
    {
        $data['nome']            = $request['nome'];
        $data['contato']         = $request['contato'];
        $data['data-nascimento'] = $request['data-nascimento'];
        $data['batizado']        = $request['batizado'];
        $data['status']          = $request['status'];
        $data['data-entrada']    = $request['data-entrada'];

        DB::table('membros')->insert([
            $data
        ]);

        redirect('/cadastro')->with('cadastrado', "Usuário cadastrado com sucesso");
    }
}
