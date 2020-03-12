<?php require 'application/views/header.php'; ?>

<body>
    <form action="update" actionmethod="post">
        <div class="form-group">
            <div class="form-row">
                <label for="inputText">Текст задачи</label>
                <input type="text" class="form-control" id="inputText" placeholder="<?php echo $vars[0]['text']; ?>">

                <label for="inputUser">Имя постановщика</label>
                <input type="text" class="form-control" id="inputUser" placeholder="<?php echo $vars[0]['name']; ?>">

                <label for="inputEmail4">Email постановщика</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $vars[0]['email']; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

<?php require 'application/views/footer.php'; ?>