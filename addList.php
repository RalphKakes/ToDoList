<?php

require 'functions.php';

if (!empty($_POST['listName'])) {
    addList($_POST['listName']);
    $listId = getDataByColumn('id', 'todo', 'name', $_POST["listName"]);
    header('Location: index.php');
}