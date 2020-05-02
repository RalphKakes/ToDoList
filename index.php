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
        <input name="listName" type="text" class="form-control" autocomplete="off" placeholder="Vul de naam in van de lijst">
    </div>
</form>
      <?php  foreach (getAllData('*', 'todo') as $todo) { ?>
       <details>
        <summary><?= $todo['name'] ?></summary>
            <?php } ?>

            <?php  foreach (getAllData('*', 'task') as $task) { ?>
                <p><?= $task['id'] ?></p>
                <p><?= $task['taskdesc'] ?></p>
<?php } ?>
</body>
</html>

