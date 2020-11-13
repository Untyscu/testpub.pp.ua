<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__nav">
            <img src="/img/logo.png" alt="" class="header__logo">
            <a href="/" class="header__link">Главная</a>
            <a href="/employees" class="header__link">Сотрудники</a>
            <a href="/departments" class="header__link">Отделы</a>
        </div>
    </div>
</header>
@yield('content')
<script src="/js/main.js"></script>
</body>
</html>
