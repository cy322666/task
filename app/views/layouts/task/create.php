<?php require 'app/views/default.php'; ?>

<body>
    <form action="new" method="post">
        <div class="form-group">
            <div class="form-row">
                <label for="inputText">Текст задачи</label>
                <input type="text" name="text" class="form-control" id="text" required>

                <label for="inputUser">Ваше имя</label>
                <input type="user" name="user" class="form-control" id="user" required>

                <label for="inputEmail4">Ваш Email </label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать задачу</button>
    </form>

<?php require 'app/views/footer.php'; ?>