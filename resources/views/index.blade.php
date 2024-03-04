<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewLife</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 700px;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-t-block{
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);;
            color: white;
            position: absolute;
            bottom: 0;
        }
        .fact img{
            width: 100%;
            height: 300px;
            object-fit: cover;
            border: 1px solid black
        }
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
        <section id="slider">
            <h2 class="mt-5">Недавние объявления</h2>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($carousel as $slide)
                    <div class="swiper-slide">
                        <img src="/storage/images/{{$slide->photo}}" alt="{{$slide->photo}}">
                        <div class="swiper-t-block">
                            <p class="mb-0">{{$slide->kinds->title_kind}}</p>
                            <p class="mb-0 stylish">{{$slide->description}}</p>
                            <a class="btn btn-primary mb-5" href="/detailPost/{{$slide->id}}">Подробнее</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <section id="find">
            <h2 class="mt-5">Поиск животных</h2>
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
        <section id="facts">
            <h2 class="mt-5">Интересные факты о компании</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="fact">
                        <img src="/img/cat.jpg" alt="Факт 1">
                        <h3>Помогли найти более 500 животных.</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fact">
                        <img src="/img/3.png" alt="Факт 2">
                        <h3>Более трех лет способствуем возвращению питомцев к хозяевам.</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fact">
                        <img src="/img/gosling.jpg" alt="Факт 3">
                        <h3>Все услуги оказываются бесплатно.</h3>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h2 class="mt-5">Животные</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/images/{{$post->photo}}" class="card-img-top" alt="{{$post->photo}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->kinds->title_kind}}</h5>
                                <p class="card-text">Район: {{$post->areas->title_area}}</p>
                                <p class="card-text">Контактный телефон: {{$post->contact_number}}</p>
                                <p class="card-text">Дата размещения: {{$post->created_at}}</p>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary" href="/detailPost/{{$post->id}}">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section id="comm">
            <h2 class="mt-5">Отзывы</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Алексей</h5>
                            <img src="/img/rewiew1.jpg" class="card-img-top" alt="Фото животного 1">
                            <p class="card-text">Наконец-то нашел своего пушистика</p>
                            <p class="card-text"><small class="text-muted">23.01.2024</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Даня</h5>
                            <img src="/img/rewiew2.jpg" class="card-img-top" alt="Фото животного 2">
                            <p class="card-text">Нашел своего джунгарского хомячка благодаря объявлению, оказалось он в канализацию упал</p>
                            <p class="card-text"><small class="text-muted">03.02.2024</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Игорь</h5>
                            <img src="/img/rewiew3.jpg" class="card-img-top" alt="Фото животного 3">
                            <p class="card-text">Спасибо огромное!!!!</p>
                            <p class="card-text"><small class="text-muted">15.01.2024</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
</body>

</html>
