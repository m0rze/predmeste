<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
            </div>
            <div class="col-4">
                <form method="post" class="" action="{{ route("gologin") }}">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-12">
                            @if($errors->any())
                                <h4 class="text-danger">{{$errors->first()}}</h4>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input name="username" type="text" class="form-control form-item" placeholder="Логин">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input name="password" type="password" class="form-control form-item" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <button class="btn btn-rnd btn-success form-item">Войти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
