@extends('dashboard')
@section('dashboard')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ isset($data) ? 'Atualizar' : 'Cadastrar' }} Membro</strong>
            </div>
            <div class="card-body card-block">
                @if (isset($data))
                    <form action="{{ route('membro.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ route('membro.cadastro') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @endif

                @csrf
                <input type="hidden" id="id" name="id" placeholder="" class="form-control"
                    value="{{ isset($data->id) ? $data->id : ' ' }}">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="nome" class=" form-control-label">Nome</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" id="nome" name="nome" placeholder="" class="form-control"
                            value="{{ isset($data->nome) ? $data->nome : ' ' }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="contato" class=" form-control-label">Contato</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input onkeyup="handlePhone(event)" maxlength="15" type="tel" id="contato" name="contato"
                            placeholder="" class="form-control" value="{{ isset($data->contato) ? $data->contato : ' ' }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="foto" class=" form-control-label">Foto</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="file" id="foto" name="foto" class="form-control-file">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="data-nascimento" class=" form-control-label">Data nascimento</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="date" id="data-nascimento" name="data_nascimento" placeholder=""
                            class="form-control"
                            value="{{ isset($data->data_nascimento) ? $data->data_nascimento->format('Y-m-d') : ' ' }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="batizado" class=" form-control-label">Batizado</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="batizado" id="batizado" class="form-control">
                            @if (isset($data) && $data->status == 1)
                                <option selected value="1">Sim</option>
                                <option value="2">Não</option>
                            @elseif(isset($data) && $data->status == 2)
                                <option value="1">Sim</option>
                                <option selected value="2">Não</option>
                            @else
                                <option value="1">Sim</option>
                                <option value="2">Não</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="status" id="status" class="form-control">
                            @if (isset($data) && $data->status == 1)
                                <option selected value="1">Ativo</option>
                                <option value="2">Inativo</option>
                            @elseif(isset($data) && $data->status == 2)
                                <option value="1">Ativo</option>
                                <option selected value="2">Inativo</option>
                            @else
                                <option value="1">Sim</option>
                                <option value="2">Não</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <label for="data-entrada" class=" form-control-label">Data de entrada</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="date" id="data-entrada" name="data_entrada" placeholder="" class="form-control"
                            value="{{ isset($data->data_entrada) ? $data->data_entrada->format('Y-m-d') : ' ' }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12 col-md-6">
                        <button type="submit"
                            class="btn btn-primary">{{ isset($data) ? 'Atualizar' : 'Cadastrar' }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
@endsection
