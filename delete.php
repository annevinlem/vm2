<?php

$task_name = str_replace("\n","",$_POST["task_name"]);

if ($task_name)
{
    $tasks = file("tasks.txt");

    $out = array();

    foreach($tasks as $task) {
        if(trim($task) != $task_name) {
            $out[] = $task;
        }
    }

    $fp = fopen("tasks.txt", "w+");
    flock($fp, LOCK_EX);

    foreach($out as $line) {
        fwrite($fp, $line);
    }

    flock($fp, LOCK_UN);
    fclose($fp);


    $tasks_reloaded = file("tasks.txt");
    $html = '';

    //Перебираем все элементы массива в цикле
    foreach ($tasks_reloaded as $task)
    {
        $html .= <<<HTML
<div class="item clearfix">
    <div class="checkbox"></div>
    <h2 class="name">$task</h2>
    <div class="action-buttons clearfix">
        <i class="ti-close" id="delete"></i>
    </div>
</div>
HTML;
    }

    echo $html;
}
else
{
    return false;
}