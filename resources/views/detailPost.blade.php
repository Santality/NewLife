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
        img{
            width: 60%;
            margin: 0 auto;
            display: block;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <img src="/storage/images/{{$post->photo}}" alt="{{$post->photo}}">
        <h2>{{$post->kinds->title_kind}}</h2>
        <p>{{$post->description}}</p>
        <p>Контактный номер: {{$post->contact_number}}</p>
        <p>Email: {{$post->contact_email}}</p>
        <p>Клеймо: {{$post->mark}}</p>
        <p>Район: {{$post->areas->title_area}}</p>
        <p>Дата обнаружения: {{$post->find_date}}</p>
    </div>
    <x-footer></x-footer>
</body>
</html>
