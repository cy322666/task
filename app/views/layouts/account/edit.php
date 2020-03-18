<form action="update" method="post">
    <div class="form-group">
        <div class="form-row">
            <label for="inputText">Текст задачи</label>
            <input type="text" class="form-control" id="text" name="text" placeholder="<?php echo $vars[0]['text']; ?>">

            <label for="inputUser">Имя постановщика</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $vars[0]['name']; ?>">

            <label for="inputEmail4">Email постановщика</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $vars[0]['email']; ?>">
            <?php
            if ($vars[0]['status'] == 'active') {
                echo "
                    <div class='form-check' style='padding-top: 10px'>
                        <input class='form-check-input' type='checkbox' name='checkbox' value='completed' id='checkbox'>
                        <label class='form-check-label' for='defaultCheck1'>Выполнить задачу</label>
                     </div> ";
            }
            ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>

