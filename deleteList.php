<?php

require 'functions.php';
// $task = getDataByColumn('*', 'task', 'list_id', $_GET['listId']);

    deleteTasksInList($_GET['listId']);
    deleteList($_GET['listId']);
    header('Location: index.php');
