@extends('dashboard')
@section('dashboard')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Novo membro</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('membro.cadastro') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <label for="nome" class=" form-control-label">Nome</label>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" id="nome" name="nome" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <label for="contato" class=" form-control-label">Contato</label>
                        </div>
                        <div class="col-12 col-md-6">
                            <input onkeyup="handlePhone(event)" maxlength="15" type="tel" id="contato" name="contato"
                                placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <label for="data-nascimento" class=" form-control-label">Data nascimento</label>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="date" id="data-nascimento" name="data-nascimento" placeholder=""
                                class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <label for="batizado" class=" form-control-label">Batizado</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <select name="batizado" id="batizado" class="form-control">
                                <option value="1">Sim</option>
                                <option value="2">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <label for="status" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="2">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <label for="data-entrada" class=" form-control-label">Data de entrada</label>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="date" id="data-entrada" name="data-entrada" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-primary" >Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
