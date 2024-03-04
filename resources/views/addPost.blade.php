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
        <h2 class="mt-3">Добавить объявление</h2>
        <form action="/storePost" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail человека, нашедшего животное</label>
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
                <label for="phone" class="form-label">Телефон человека, нашедшего животное</label>
                <input type="tel" class="form-control" id="phone" name="phone">
                @error('phone')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kind" class="form-label">Вид животного</label>
                <select class="form-select" name="kind" id="kind">
                    @foreach ($kinds as $kind)
                    <option value="{{$kind->id}}">{{$kind->title_kind}}</option>
                    @endforeach
                </select>
                @error('kind')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Фото животного</label>
                <input type="file" class="form-control" id="photo" name="photo">
                @error('photo')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
              </div>
            <div class="mb-3">
                <label for="description" class="form-label">Дополнительная информация</label>
                <input type="text" class="form-control" id="description" name="description">
                @error('description')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mark" class="form-label">Клеймо</label>
                <input type="text" class="form-control" id="mark" name="mark" placeholder="Если есть">
                @error('mark')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Район</label>
                <select class="form-select" name="area" id="area">
                    @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->title_area}}</option>
                    @endforeach
                </select>
                @error('area')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="find_date" class="form-label">Дата нахождения</label>
                <input type="date" class="form-control" id="find_date" name="find_date">
                @error('find_date')
                    <div class="alert alert-danger alert-dismissible">
                        <div class="alert-text">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                <label class="form-check-label" for="agreement">Я согласен на обработку персональных данных</label>
            </div>
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </form>
    </div>
</body>

</html>
