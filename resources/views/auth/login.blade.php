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
                    <form>
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" class="form-control" name="user" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                        <button type="submit" class="btn bg-dark btn-flat text-light m-b-30 m-t-30">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
