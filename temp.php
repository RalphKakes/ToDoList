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
        <a href="deleteTask.php?taskId=<?= $task['id']?>"><i class="fa fas fa-trash"></i></a>
        <h4>Omschrijving</h4>
        <!-- Edit the task description-->
        <p><?= $task['taskDesc'] ?></p>
        <form action="editDesc.php" method="post">
            <div class="form-group hideTaskDesc" id="editTaskDesc<?= $task['id']?>">
                <input value="<?= $task['taskDesc'] ?>" required name="editTaskDesc" type="text" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de taak omschrijving">
                <input name="taskId" type="hidden" autocomplete="off" value="<?= $task['id']?>" class="form-control">
                <input type="submit" class="btn btn-primary ">
            </div>
        </form>
        <i class="fa fas fa-edit" onclick="showTaskDesc(<?= $task['id'] ?>)"></i>
        <h4>Duur</h4>
        <p><?= $task['taskDur'] ?></p>
        <form action="editDur.php" method="post">
            <div class="form-group hideTaskDur" id="editTaskDur<?= $task['id'] ?>">
                <input value="<?= $task['taskDur'] ?>" required name="editTaskDur" type="number" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de taak omschrijving">
                <input name="taskId" type="hidden" autocomplete="off" value="<?= $task['id']?>" class="form-control">
                <input type="submit" class="btn btn-primary ">
            </div>
        </form>
        <i class="fa fas fa-edit" onclick="showTaskDur(<?= $task['id'] ?>)"></i>
        <h4>Status</h4>
    <?php if ($task['status'] == 0){ ?>
        <p>Not done</p>
        <?php  } else { ?>
        <p>Done</p>
        <?php } ?>
        <form action="editStatus.php" method="post">
            <div class="form-group hideTaskStatus" id="editStatus<?= $task['id']?>">
                <input value="1" required name="editTaskStatus" type="checkbox" class="form-control " autocomplete="off" placeholder="Vul de nieuwe naam in van de taak omschrijving">
                <input name="taskId" type="hidden" autocomplete="off" value="<?= $task['id']?>" class="form-control">
                <input type="submit" class="btn btn-primary ">
            </div>
        </form>


    <?php } ?>
</details>
<?php } ?>