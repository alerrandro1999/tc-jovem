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
        $data['nome']            = $request->nome;
        $data['contato']         = $request->contato;
        $data['data_nascimento'] = $request->data_nascimento;
        $data['batizado']        = $request->batizado;
        $data['status']          = $request->status;
        $data['data_entrada']    = $request->data_entrada;

        if ($request->foto) {

            $requestImage = $request->foto ? $request->foto : '';

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('images/membros'), $imageName);

            $data['imagem'] = $imageName;
        }else {
            $data['imagem'] = 'sem foto';
        }

        DB::table('membros')->insert([$data]);

        return redirect()->route('dashboard')->with('cadastrado', "Membro cadastrado com sucesso");
    }

    public function update(Request $request)
    {
        // dd($request);
        $membro = Membros::find($request['id']);
        $data['nome']            = $request->nome;
        $data['contato']         = $request->contato;
        $data['data_nascimento'] = $request->data_nascimento;
        $data['batizado']        = $request->batizado;
        $data['status']          = $request->status;
        $data['data_entrada']    = $request->data_entrada;

        $requestImage = $request->foto;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

        $requestImage->move(public_path('images/membros'), $imageName);

        $membro->imagem = $imageName;

        $membro->save();

        return redirect()->route('dashboard')->with('cadastrado', "Membro Atualizado com sucesso");
    }

    public function delete($id)
    {
        $membro = Membros::find($id);
        $membro->delete();
        return redirect()->route('dashboard')->with('deletado', "Membro deletado com sucesso");
    }
}
