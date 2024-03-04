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
        <section id="find">
            <h2 class="mt-2">Поиск животных</h2>
            <form action="/findPost" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Вид</label>
                    <select class="form-select" name="kind">
                        @foreach ($kinds as $kind)
                        <option value="{{$kind->id}}">{{$kind->title_kind}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Район</label>
                    <select class="form-select" name="area">
                        @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->title_area}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </section>
        <section>
            <h2 class="mt-3">Животные</h2>
            <div class="row">
                @forelse ($posts as $post)
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
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary" href="/detailPost/{{$post->id}}">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <h5>По вашим параметрам, ничего не найдено</h5>
                @endforelse
            </div>
            <div class="mt-3">{{ $posts->withQueryString()->links('pagination::bootstrap-5') }}</div>
        </section>
    </div>
    <x-footer></x-footer>
</body>

</html>
