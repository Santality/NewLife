<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-2">
            <li class="nav-item px-2 text-body-secondary">Телефон: 8 (800)123-45-67</li>
            <li class="nav-item px-2 text-body-secondary">E-mail: mail@newlife.ru</li>
        </ul>
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Главная</a></li>
            @guest
            <li class="nav-item"><a href="/reg" class="nav-link px-2 text-body-secondary">Регистрация</a></li>
            <li class="nav-item"><a href="/auth" class="nav-link px-2 text-body-secondary">Авторизация</a></li>
            @endguest
            @auth
            <li class="nav-item"><a href="/profile" class="nav-link px-2 text-body-secondary">Личный кабинет</a></li>
            @endauth
            <li class="nav-item"><a href="/addPost" class="nav-link px-2 text-body-secondary">Найдено животное</a></li>
            <li class="nav-item"><a href="/#find" class="nav-link px-2 text-body-secondary">Поиск</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; 2024 NewLife</p>
    </footer>
  </div>
