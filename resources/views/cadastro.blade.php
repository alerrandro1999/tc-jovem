@extends('dashboard')
@section('dashboard')
    <div class="content">
        {{-- {{dd($data)}} --}}
        <div class="col-md-4 ml-auto text-right no-gutters">
            <a href="{{ route('membro.novo') }}" type="button" class="btn btn-primary mb-3"><i
                    class="fa fa-plus-circle"></i>&nbsp; Novo Membro</a>
        </div>

        @if (session('cadastrado'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Sucesso</span>
                {{ session('cadastrado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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
                                        <th>ID</th>
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
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['nome'] }}</td>
                                            <td>{{ $item['contato'] }}</td>
                                            <td>{{ date('d/m/Y', strtotime($item['data-nascimento'])) }}</td>
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
                                            <td>{{ date('d/m/Y', strtotime($item['data-entrada'])) }}</td>
                                            <td>
                                                <a href="{{ route('membro.novo') }}/{{ $item['id'] }}" type="button"
                                                    class="btn btn-primary mb-3"><i class="fa fa-edit (alias)"></i>&nbsp;
                                                    Editar</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('membro.novo') }}/{{ $item['id'] }}" type="button"
                                                    class="btn btn-danger mb-3"><i class="fa fa-regular fa-trash"></i>&nbsp;
                                                    Excluir</a>
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
