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
    $conn = OpenCon();
    $query = $conn->prepare("SELECT $columns FROM $table WHERE $column = :value");
    $query->execute([':value'=>$value]);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    $conn = null;
    return $result;
}

function addList ($listName) {
    $conn = OpenCon();
    $query = $conn->prepare("INSERT INTO todo (name) VALUES (:name)");
    $query->execute([':name'=>$listName]);
    $conn = null;
}

function getDataById(){
    $conn = openCon();

}
