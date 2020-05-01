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

function getDataById ($columns, $table, $id) {
    $conn = openCon();
    $query = $conn->prepare("SELECT $columns FROM $table WHERE id = $id");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetch();
    $conn = null;
    return $result;
}

