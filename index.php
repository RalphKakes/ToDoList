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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
<!-- Sort data based on status --> 
<!-- Shows all lists with or without tasks in them-->
<div class="mt-10">
    
    <!-- Makes a new list-->
    <form action="addList.php" method="post" id="addListForm">
        <div class="w-1/4 mx-auto">
        <h1 class="-ml-4 text-4xl text-center">Todo list</h1>
            <h1>Add a list</h1>
            <div class="flex">
                <input required type="text" autocomplete="off"  name="listName" class="py-2 px-3 border border-gray-500 w-full" placeholder="Vul de naam in van de lijst">
                <button class="py-2 px-4 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100">Save</button>
            </div>
        </div>
    </form>
    <?php  foreach (getAllData('*', 'todo') as $todo) { ?>
        <div class="mx-auto w-full flex justify-center my-2">
            <div class="p-2 w-2/3 border rounded-lg">
            <form action="editList.php" method="post">
                <div class="form-group hideEdit" id="editList<?= $todo['id']?>">
                    <input name="listId" type="hidden" autocomplete="off" value="<?= $todo['id']?>" class="form-control">
                    <input value="<?= $todo['name'] ?>" required name="editlistName" type="text" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de lijst">
                    <input type="submit" class="btn btn-primary ">
                </div>
            </form>
            <i class="fa fas fa-edit" onclick="showInput(<?= $todo['id'] ?>)"></i>
            <a href="deleteList.php?listId=<?= $todo['id']?>"><i class="fa fas fa-trash"></i></a>
            <div class="flex">
                <button onclick="document.getElementById('status').style.display = 'block', document.getElementById('nothing').style.display = 'none', document.getElementById('duration').style.display = 'none'" class="text-sm py-1 px-2 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 rounded-lg mr-2">Sort by status</button>
                <button onclick="document.getElementById('nothing').style.display = 'block', document.getElementById('status').style.display = 'none', document.getElementById('duration').style.display = 'none'" class="text-sm py-1 px-2 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 rounded-lg ml-2">Sort by nothing</button>
                <button onclick="document.getElementById('duration').style.display = 'block', document.getElementById('nothing').style.display = 'none', document.getElementById('status').style.display = 'none'" class="text-sm py-1 px-2 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 rounded-lg ml-2">Sort by duration</button>
            </div>
                <summary><?= $todo['name'] ?></summary>
                <details>
                <div id="nothing" style="display: block">
                <?php foreach (getDataByColumn('*', 'task', 'list_id', $todo["id"]) as $task) { ?>
                    <div class="my-3">
                        <div style="height: 1px" class="w-full bg-black mt-2"></div>
                        <form action="editTask.php" method="post" class="my-3">
                            <input name="taskId" type="hidden" value="<?= $task['id']?>" class="form-control">
                            <div class="w-2/12">
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">TaskID:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskId" disabled value="<?= $task['id'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">Description:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskDesc" value="<?= $task['taskDesc'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">Duration:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskDuration" value="<?= $task['taskDur'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">Status:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskStatus" value="<?= $task['status'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <button type="submit" class="text-sm py-1 px-2 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 rounded-lg">Save</button>
                                <a class="text-sm py-1 px-2 bg-red-500 text-white hover:bg-red-600 transition ease-in-out duration-100 rounded-lg" href="deleteTask.php?taskId=<?= $task['id']?>">Delete</a>
                            </div>
                        </form>
                    </div>
                <?php } ?> 
                </div>
                <div id="status" style="display: none">
                <?php foreach (sortByStatus($todo["id"]) as $task) { ?>
                    <div class="my-3">
                        <div style="height: 1px" class="w-full bg-black mt-2"></div>
                        <form action="editTask.php" method="post" class="my-3">
                            <input name="taskId" type="hidden" value="<?= $task['id']?>" class="form-control">
                            <div class="w-2/12">
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">TaskID:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskId" disabled value="<?= $task['id'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">Description:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskDesc" value="<?= $task['taskDesc'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">Duration:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskDuration" value="<?= $task['taskDur'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <h1 class="text-sm font-semibold">Status:</h1>
                                    </div>
                                    <div class="w-1/2">
                                        <input name="taskStatus" value="<?= $task['status'] ?>" class="text-sm">
                                    </div>
                                </div>
                                <button type="submit" class="text-sm py-1 px-2 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 rounded-lg">Save</button>
                                <a class="text-sm py-1 px-2 bg-red-500 text-white hover:bg-red-600 transition ease-in-out duration-100 rounded-lg" href="deleteTask.php?taskId=<?= $task['id']?>">Delete</a>
                            </div>
                        </form>
                    </div>
                <?php } ?>
                </div>
                <div id="duration" style="display: none">
                    <?php foreach ( sortByDuration($todo["id"]) as $task) { ?>
                        <div class="my-3">
                            <div style="height: 1px" class="w-full bg-black mt-2"></div>
                            <form action="editTask.php" method="post" class="my-3">
                                <input name="taskId" type="hidden" value="<?= $task['id']?>" class="form-control">
                                <div class="w-2/12">
                                    <div class="flex w-full">
                                        <div class="w-1/2">
                                            <h1 class="text-sm font-semibold">TaskID:</h1>
                                        </div>
                                        <div class="w-1/2">
                                            <input name="taskId" disabled value="<?= $task['id'] ?>" class="text-sm">
                                        </div>
                                    </div>
                                    <div class="flex w-full">
                                        <div class="w-1/2">
                                            <h1 class="text-sm font-semibold">Description:</h1>
                                        </div>
                                        <div class="w-1/2">
                                            <input name="taskDesc" value="<?= $task['taskDesc'] ?>" class="text-sm">
                                        </div>
                                    </div>
                                    <div class="flex w-full">
                                        <div class="w-1/2">
                                            <h1 class="text-sm font-semibold">Duration:</h1>
                                        </div>
                                        <div class="w-1/2">
                                            <input name="taskDuration" value="<?= $task['taskDur'] ?>" class="text-sm">
                                        </div>
                                    </div>
                                    <div class="flex w-full">
                                        <div class="w-1/2">
                                            <h1 class="text-sm font-semibold">Status:</h1>
                                        </div>
                                        <div class="w-1/2">
                                            <input name="taskStatus" value="<?= $task['status'] ?>" class="text-sm">
                                        </div>
                                    </div>
                                    <button type="submit" class="text-sm py-1 px-2 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 rounded-lg">Save</button>
                                    <a class="text-sm py-1 px-2 bg-red-500 text-white hover:bg-red-600 transition ease-in-out duration-100 rounded-lg" href="deleteTask.php?taskId=<?= $task['id']?>">Delete</a>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div style="height: 1px" class="w-full bg-black mb-2"></div>
                <h1 class="text-sm font-semibold mt-4 mb-1">Adding a new task</h1>
                <form action="addTask.php" method="post" class="w-2/12">
                    <input name="listId" type="hidden" value="<?= $todo['id']?>" class="form-control">
                    <input name="taskStatus" type="hidden" value="<?= $task['status']?>" class="form-control">
                    <div class="flex w-full my-1">
                        <div class="w-1/2">
                            <h1 class="text-sm">Description:</h1>
                        </div>
                        <div class="w-1/2">
                            <input name="taskDesc" class="text-sm px-1 border border-gray-500 rounded-lg">
                        </div>
                    </div>
                    <div class="flex w-full my-1">
                        <div class="w-1/2">
                            <h1 class="text-sm">Duration:</h1>
                        </div>
                        <div class="w-1/2">
                            <input name="taskDuration" class="text-sm px-1 border border-gray-500 rounded-lg">
                        </div>
                    </div>
                    <button type="submit" class="py-1 px-1 bg-green-500 text-white hover:bg-green-600 transition ease-in-out duration-100 text-sm rounded-lg">Add task</button>
                </form>
                </details>
            </div>
        </div>
    <?php } ?>
</div>
<style>
input:focus{
    outline: 0 !important;
}

summary, details{
    outline: 0 !important;
}

body{
    font-family: 'Open Sans', sans-serif;
}
</style>
</body>
</html>