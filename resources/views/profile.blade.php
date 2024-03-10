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
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
                    line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
</head>

<body>
    <x-header></x-header>
    <div class="container">
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
        <p>Количество добавленных объявлений: {{ $posts->count() }}</p>
        <p>Количество животных, вернувшихся к хозяевам: {{$find->count()}}</p>
        <p>Дата регистрации: {{Auth::user()->created_at}}</p>
        <p>Количество прошедших дней с регистрации на сайте: {{$daysPassed}}</p>
        <section>
            <h2>Список объявлений</h2>
            <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/storage/images/{{$post->photo}}" class="card-img-top" alt="{{$post->photo}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->kinds->title_kind}}</h5>
                        <p class="card-text stylish">{{$post->description}}</p>
                        <p class="card-text">Клеймо: {{$post->mark}}</p>
                        <p class="card-text">Район: {{$post->areas->title_area}}</p>
                        <p class="card-text">Дата обнаружения: {{$post->find_date}}</p>
                        <p class="card-text">Контактный телефон: {{$post->contact_number}}</p>
                        <p class="card-text">Email: {{$post->contact_email}}</p>
                        <p class="card-text">Статус: {{$post->statuses->title_status}}</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="/detailPost/{{$post->id}}">Подробнее</a>
                        </div>
                        @if ($post->status == 1 || $post->status == 2)
                        <div class="d-flex justify-content-center">
                            <h5>Управление</h5>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-success me-1" href="/postEdit/{{$post->id}}">Редактировать</a>
                            <a class="btn btn-danger" href="/postDelete/{{$post->id}}">Удалить</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            <div class="mt-3">{{ $posts->withQueryString()->links('pagination::bootstrap-5') }}</div>
        </section>
    </div>
    <x-footer></x-footer>
</body>

</html>
