<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>php echo $title ?></title>
        <h1>Hello, %username%!</h1>

    </head>

    <body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/task/newTask">Создать задачу</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Сортировать</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/task/sort/?value=name">Имя</a>
                    <a class="dropdown-item" href="/task/sort/?value=email">Почта</a>
                    <a class="dropdown-item" href="/task/sort/?value=status">Статус</a>
                    <div class="dropdown-divider">dropdown-divider</div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/task/account/login">Войти</a>
            </li>

        </ul>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    <footer>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Страница</a>
                </li>
                <li class="page-item"><a class="page-link" href="/task/?page=">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="/task/?page=">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="/task/?page=">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Следующая</a>
                </li>
            </ul>
        </nav>
    </footer>
</html>




