function showInput(listId){
    let editList = document.getElementById("editList" + listId);
    editList.classList.remove("hideEdit");
}

function showTaskDesc(taskId){
    let editTask = document.getElementById("editTaskDesc" + taskId);
    editTask.classList.remove("hideTaskDesc");
}

function showTaskDur(taskId){
    let editTask = document.getElementById("editTaskDur" + taskId);
    editTask.classList.remove("hideTaskDur");
}