<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewLife</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <x-header></x-header>
    <div class="container">
        <h2 class="mt-3">Авторизация</h2>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</body>

</html>
