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
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="script.js"></script>
</head>

<body>
<h1>Yeet</h1>
<form action="addList.php" method="post" id="addListForm">
    <div class="form-group m-0">
        <input required name="listName" type="text" class="form-control" autocomplete="off" placeholder="Vul de naam in van de lijst">
    </div>
</form>
<?php  foreach (getAllData('*', 'todo') as $todo) { ?>

<form action="editList.php" method="post">
    <div class="form-group hideEdit" id="editList<?= $todo['id']?>">
        <input name="listId" type="hidden" autocomplete="off" value="<?= $todo['id']?>" class="form-control">
        <input value="<?= $todo['name'] ?>" required name="editlistName" type="text" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de lijst">
        <input type="submit" class="btn btn-primary ">
    </div>
</form>
    <i class="fa fas fa-edit" onclick="showInput(<?= $todo['id'] ?>)"></i>
<details>
    <summary><?= $todo['name'] ?></summary>
    <h3>Voeg nieuwe taken toe:</h3>
    <form action="addTask.php" method="post">
        <div class="form-group">
            <input required name="taskDesc" type="text" autocomplete="off" class="form-control" placeholder="Zet hier je taak omschrijving neer">
            <input required name="taskDuration" type="number" autocomplete="off" class="form-control" placeholder="Zet hier de duur van de taak in">
            <input name="listId" type="hidden" value="<?= $todo['id']?>" class="form-control">
            <input name="taskStatus" type="hidden" value="<?= $task['status']?>" class="form-control">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>

    <?php  foreach (getDataByColumn('*', 'task', 'list_id', $todo["id"]) as $task) { ?>
        <h4>Omschrijving</h4>
        <p><?= $task['taskDesc'] ?></p>
        <h4>Duur</h4>
        <p><?= $task['taskDur'] ?></p>
        <h4>Status</h4>
        <?php if ($task['status'] == 0){ ?>
        <p>Not done</p>
        <?php  } else { ?>
        <p>Done</p>
        <?php } ?>


    <?php } ?>
</details>
<?php } ?>
</body>
</html>
