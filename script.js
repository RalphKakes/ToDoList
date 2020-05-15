function showInput(listId) {
    let editList = document.getElementById("editList" + listId);
    editList.classList.remove("hideEdit");
}

function showTaskEdit(taskId){
    let editTask = document.getElementById("editTask" + taskId);
    editTask.classList.remove("hideTaskDesc");
}
