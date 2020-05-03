<?php
require 'db.php';

function getAllData ($columns, $table) {
    $conn = openCon();
    $query = $conn->prepare("SELECT $columns FROM $table");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    $conn = null;
    return $result;
}

function getDataByColumn ($columns, $table, $column, $value) {
    $conn = openCon();
    $query = $conn->prepare("SELECT $columns FROM $table WHERE $column = :value");
    $query->execute([':value'=>$value]);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    $conn = null;
    return $result;
}

function addList ($listName) {
    $conn = openCon();
    $query = $conn->prepare("INSERT INTO todo (name) VALUES (:name)");
    $query->execute([':name'=>$listName]);
    $conn = null;
}

function addTask($taskDescription, $taskDuration, $listId, $taskStatus){
    $conn = openCon();
    $query = $conn->prepare("INSERT INTO task (taskDesc, taskDur, list_id, status) VALUES (:taskdescription, :taskduration, :listid, :taskstatus)");
    $query->execute([':taskdescription'=>$taskDescription, ':taskduration'=>$taskDuration, ':listid'=>$listId, ':taskstatus'=>$taskStatus]);
    $conn = null;
}

