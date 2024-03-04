<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewLife</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .stylish{
            margin-bottom: 350px;
        }
    </style>
</head>

<body>
    <x-header></x-header>
    <div class="container stylish">
        <h2 class="mt-3">Личный кабинет</h2>
        <p>Имя: {{Auth::user()->name}}</p>
        <p>Фамилия: {{Auth::user()->lastname}}</p>
        <form action="/editPhone" method="POST">
            @csrf
            <label for="phone">Номер телефона</label>
            <input id="phone" type="text" name="phone" value="{{Auth::user()->phone}}">
            <button class="btn btn-primary">Изменить</button>
        </form>
        <form action="/editEmail" method="POST">
            @csrf
            <label class="mt-4 mb-4" for="email">Email</label>
            <input id="email" type="email" name="email" value="{{Auth::user()->email}}">
            <button class="btn btn-primary">Изменить</button>
        </form>
        <p>Дата регистрации: {{Auth::user()->created_at}}</p>
        <p>Количество прошедших дней с регистрации на сайте: {{$daysPassed}}</p>
    </div>
    <x-footer></x-footer>
</body>

</html>
