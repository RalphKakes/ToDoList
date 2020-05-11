<?php

require 'functions.php';

if (!empty($_POST['editlistName'])) {
    editList($_POST['listId'], $_POST['editlistName']);
    $listId = getDataByColumn('id', 'todo', 'id', $_POST["editlistName"]);
    header('Location: index.php');
}

