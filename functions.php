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

function sortByStatus ($listid) {
    $conn = openCon();
    $query = $conn->prepare("SELECT * FROM task WHERE list_id = :listid ORDER BY `task`.`status` DESC");
    $query->execute([':listid'=>$listid]);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    $conn = null;
    return $result;
}

function sortByDuration ($listid) {
    $conn = openCon();
    $query = $conn->prepare("SELECT * FROM task WHERE list_id = :listid ORDER BY `task`.`taskDur` ASC");
    $query->execute([':listid'=>$listid]);
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

function addTask ($taskDescription, $taskDuration, $listId, $taskStatus){
    $conn = openCon();
    $query = $conn->prepare("INSERT INTO task (taskDesc, taskDur, list_id, status) VALUES (:taskdescription, :taskduration, :listid, :taskstatus)");
    $query->execute([':taskdescription'=>$taskDescription, ':taskduration'=>$taskDuration, ':listid'=>$listId, ':taskstatus'=>$taskStatus]);
    $conn = null;
}

function editTask ($taskDesc, $taskDuration, $taskStatus, $taskId) {
    $conn = openCon();
    $query = $conn->prepare("UPDATE task SET taskDesc = :taskDesc, taskDur = :taskDur, status = :taskStatus WHERE id = :taskId");
    $query->execute([':taskDesc'=>$taskDesc, ':taskDur'=>$taskDuration, ':taskStatus'=>$taskStatus, ':taskId'=>$taskId]);
    $conn = null;
}

function deleteTask ($id){
    $conn = openCon();
    $query = $conn->prepare("DELETE FROM task WHERE id = :taskId");
    $query->execute([':taskId'=>$id]);
    $conn = null;
}

function editList ($listId, $editListName) {
    $conn = openCon();
    $query = $conn->prepare("UPDATE todo SET name = :name WHERE id = :listId");
    $query->execute([':name'=>$editListName, ':listId'=>$listId]);
    $conn = null;
}

function deleteList ($listId) {
    $conn = openCon();
    $query = $conn->prepare("DELETE FROM todo WHERE id = :listId");
    $query->execute([':listId'=>$listId]);
    $conn = null;
}

function deleteTasksInList ($taskId) {
    $conn = OpenCon();
    $query = $conn->prepare("DELETE FROM task WHERE list_id = :listId");
    $query->execute([':listId'=>$taskId]);
    $conn = null;
}



