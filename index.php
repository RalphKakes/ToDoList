<?php
// include the functions.php file for all the php logic and connection function//
include 'functions.php';
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ToDoList</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://kit.fontawesome.com/2f6bc0b605.js" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<h1>Yeet</h1>
<form action="addList.php" method="post" id="addListForm">
    <div class="form-group m-0">
        <input required name="listName" type="text" class="form-control" autocomplete="off" placeholder="Vul de naam in van de lijst">
    </div>
</form>
<?php  foreach (getAllData('*', 'todo') as $todo) { ?>
<details>
    <summary><?= $todo['name'] ?></summary>

    <?php  foreach (getDataByColumn('*', 'task', 'list_id', $todo["id"]) as $task) { ?>
        <p><?= $task['id'] ?></p>
        <p><?= $task['taskdesc'] ?></p>
        <p><?= $task['time'] ?></p>
        <p><?= $task['list_id'] ?></p>
        <form action="addTask.php" method="post">
            <div class="form-group">
                <input required name="taskDesc" type="text" autocomplete="off" class="form-control" placeholder="Zet hier je taak omschrijving neer">
                <input required name="taskDuration" type="number" autocomplete="off" class="form-control" placeholder="Zet hier de duur van de taak in">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    <?php } ?>
</details>
<?php } ?>
</body>
</html>
