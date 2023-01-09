@extends('dashboard')
@section('dashboard')
    <div class="content">
        @if (session('cadastrado'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Sucesso</span>
                {{ session('cadastrado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('deletado'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Sucesso</span>
                {{ session('deletado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $count }}</span></div>
                                    <div class="stat-heading">Membros</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $ativos }}</span></div>
                                    <div class="stat-heading">Ativos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-7">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $inativos }}</span></div>
                                    <div class="stat-heading">Inativos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($aniversarios)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Aniversariantes do més <small><span
                                        class="badge badge-success float-right mt-1">{{ $countNiver }}</span></small></strong>
                        </div>
                        <div class="card-body">
                            @foreach ($aniversarios as $pessoa)
                                <p class="card-text">{{ $pessoa['nome'] }} |
                                    {{ date('d/m/Y', strtotime($pessoa['data_nascimento'])) }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif


            @if ($niverDay)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Aniversariantes do dia <small>
                        </div>
                        <div class="card-body">
                            @foreach ($niverDay as $pessoa)
                                <p class="card-text">{{ $pessoa['nome'] }} |
                                    {{ date('d/m/Y', strtotime($pessoa['data_nascimento'])) }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Membros do TC - Jovem</strong>
                        </div>
                        <div class="card-body">
                            <table id="cadastro-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Contato</th>
                                        <th>Data Nascimento</th>
                                        <th>Batizado</th>
                                        <th>Status</th>
                                        <th>Data Entrada</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                @if ($item['imagem'] != 'sem foto')
                                                <img src="images/membros/{{$item['imagem']}}" width="50px" height="50px">
                                                @else
                                                <img src="images/tc-jovem.jpg" width="50px" height="50px">
                                                @endif
                                            </td>
                                            <td>{{ $item['nome'] }}</td>
                                            <td>{{ $item['contato'] }}</td>
                                            <td>{{ date('d/m/Y', strtotime($item['data_nascimento'])) }}</td>
                                            <td>
                                                @if ($item['batizado'] == 1)
                                                    <span class="badge badge-success">Sim</span>
                                                @else
                                                    <span class="badge badge-danger">Não</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item['status'] == 1)
                                                    <span class="badge badge-success">Ativo</span>
                                                @else
                                                    <span class="badge badge-danger">Inativo</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($item['data_entrada'])) }}</td>
                                            <td>
                                                <a href="{{ route('membro.updatecheck', $item['id']) }}" type="button"
                                                    class="btn btn-primary mb-3"><i class="fa fa-edit (alias)"></i>&nbsp;
                                                    Editar</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('membro.delete', $item['id']) }}" type="button"
                                                    class="btn btn-danger mb-3"><i class="fa fa-regular fa-trash"></i>&nbsp;
                                                    Excluir</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
