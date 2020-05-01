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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<h1>Yeet</h1>
<form method="POST">
<div class="form-group">
<label>New List</label>
    <input type="text" name="name">
</div>
    <div>
      <?php  foreach (getAllData('*', 'todo') as $todo) { ?>
    <table class="table">
        <thead>
        <tr>
        <th><?php echo $todo['id']; ?></th>
        <th><?php echo $todo['list']; ?></th>
        <th><?php echo $todo['task']; ?></th>
        </tr>
        </thead>
    </table>
        <?php } ?>
    </div>
</form>
</body>
</html>

