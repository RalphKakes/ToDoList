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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<h1>ToDoList</h1>
<!-- Makes a new list-->
<form action="addList.php" method="post" id="addListForm">
    <div class="form-group m-0">
        <input required name="listName" type="text" class="form-control" autocomplete="off" placeholder="Vul de naam in van de lijst">
    </div>
</form>
<!-- Shows all lists with or without tasks in them-->
<?php  foreach (getAllData('*', 'todo') as $todo) { ?>
<!-- edits the list name-->
<form action="editList.php" method="post">
    <div class="form-group hideEdit" id="editList<?= $todo['id']?>">
        <input name="listId" type="hidden" autocomplete="off" value="<?= $todo['id']?>" class="form-control">
        <input value="<?= $todo['name'] ?>" required name="editlistName" type="text" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de lijst">
        <input type="submit" class="btn btn-primary ">
    </div>
</form>
    <i class="fa fas fa-edit" onclick="showInput(<?= $todo['id'] ?>)"></i>
    <!-- Delete list with tasks in it-->
    <a href="deleteList.php?listId=<?= $todo['id']?>"><i class="fa fas fa-trash"></i></a>
<details>
    <summary><?= $todo['name'] ?></summary>
    <!-- Adds new tasks to the list-->
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
    <!--Shows all the tasks -->
    <?php  foreach (getDataByColumn('*', 'task', 'list_id', $todo["id"]) as $task) { ?>
        <h4>Omschrijving</h4>
        <!-- Edit the task description-->
        <p><?= $task['taskDesc'] ?></p>
        <form action="editDesc.php" method="post">
            <div class="form-group " id="editList">
                <input value="<?= $task['taskDesc'] ?>" required name="editTaskDesc" type="text" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de taak omschrijving">
                <input name="taskId" type="hidden" autocomplete="off" value="<?= $task['id']?>" class="form-control">
                <input type="submit" class="btn btn-primary ">
            </div>
        </form>
        <i class="fa fas fa-edit"></i>
        <h4>Duur</h4>
        <p><?= $task['taskDur'] ?></p>
        <form action="editDur.php" method="post">
            <div class="form-group " id="editList">
                <input value="<?= $task['taskDur'] ?>" required name="editTaskDur" type="number" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de taak omschrijving">
                <input name="taskId" type="hidden" autocomplete="off" value="<?= $task['id']?>" class="form-control">
                <input type="submit" class="btn btn-primary ">
            </div>
        </form>
        <i class="fa fas fa-edit"></i>
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
