@extends('welcome')
@section('content')
    <main class="container-login">
        <div class="form-container">
            <form action="" method="post">
                <h1 class="login-texto">Bem-vindo</h1>
                <input class="input-login" id="usuario" type="text" placeholder="Usuário">
                <input class="input-login" id="senha" type="password" placeholder="Senha">
                <button class="button-input" type="submit">Entrar</button>
            </form>
        </div>
    </main>
@endsection
