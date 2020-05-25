<?php

require 'functions.php';


if (!empty($_POST['taskDesc'])) {
    
    $taskDuration = intval($_POST['taskDuration']);
    $taskStatus = intval($_POST['taskStatus']);
    $taskId = intval($_POST['taskId']);
    editTask($_POST['taskDesc'], $taskDuration, $taskStatus, $taskId);
    
    header("Location: index.php");

}