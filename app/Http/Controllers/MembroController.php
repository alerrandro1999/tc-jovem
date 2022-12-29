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

    public function novoMembro(Request $request)
    {
        $data = Membros::find($request['id']);

        if (Auth::check()) {
            return view('novomembro', ['data' => $data]);
        }
        return redirect("/")->with('invalido', 'Você não tem permissão');
    }

   
    public function cadastroMembro(Request $request)
    {
        $data['nome']            = $request['nome'];
        $data['contato']         = $request['contato'];
        $data['data_nascimento'] = $request['data-nascimento'];
        $data['batizado']        = $request['batizado'];
        $data['status']          = $request['status'];
        $data['data_entrada']    = $request['data-entrada'];

        DB::table('membros')->insert([$data]);
        
        return redirect()->route('cadastro')->with('cadastrado', "Membro cadastrado com sucesso");
    }

    public function update(Request $request)
    {
        $membro = Membros::find($request['id']);
        $membro->nome               = $request['nome'];   
        $membro->contato            = $request['contato'];
        $membro->data_nascimento    = $request['data-nascimento'];
        $membro->batizado           = $request['batizado'];
        $membro->status             = $request['status'];
        $membro->data_entrada       = $request['data-entrada'];

        $membro->save();

        return redirect()->route('cadastro')->with('cadastrado', "Membro Atualizado com sucesso");
    }



}
