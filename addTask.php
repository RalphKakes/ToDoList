<?php

require 'functions.php';


if (!empty($_POST['taskDesc'])) {
    $taskDuration = intval($_POST['taskDuration']);
    addTask($_POST['taskDesc'], $_POST['taskDuration'], $_POST['listId'], $_POST['taskStatus']);
    $listId = getDataByColumn('id', 'task', 'list_id', $_POST["taskDesc"]);
    header("Location: index.php");
}