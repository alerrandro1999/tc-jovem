@extends('welcome')
@section('content')
    <div class="sufee-login d-flex align-content-center align-items-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/tc-jovem.jpg" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" class="form-control" name="name" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                        <button type="submit" class="btn bg-dark btn-flat text-light m-b-30 m-t-30">Entrar</button>
                    </form>
                    @if (session('invalido'))
                        {{-- <div class="alert alert-danger" role="alert">
                            {{session('invalido')}}
                        </div> --}}
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Error</span>
                            {{session('invalido')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
