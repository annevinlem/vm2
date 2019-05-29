<?php

function printItem($item)
{
    $html = <<<HTML
<div class="item clearfix">
    <div class="checkbox"></div>
    <h2 class="name">$item</h2>
    <div class="action-buttons clearfix">
        <i class="ti-close" id="delete"></i>
    </div>
</div>
HTML;

    echo $html;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список задач</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="fonts/roboto_c.css">
    <link rel="stylesheet" href="fonts/themify-icons.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">
    <div class="add-task clearfix">
        <input type="text" name="task_name" placeholder="Добавить новую задачу"/>
        <i class="ti-plus" id="add-new-task"></i>
    </div>
    <div class="block-container">
        <div class="header">
            <h1 class="title">Активные задачи</h1>
            <span class="desc">Вы можете добавлять, удалять и редактировать задачи</span>
        </div>
        <div class="items-list">
            <?php
            $tasks = file("tasks.txt");

            //Перебираем все элементы массива в цикле
            foreach ($tasks as $task)
            {
                printItem($task);
            }
            ?>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/common.js"></script>
</body>
</html>