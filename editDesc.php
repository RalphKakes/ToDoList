<?php
require 'functions.php';


    editTaskDesc($_POST['editTaskDesc'], $_POST['taskId']);
    header('Location: index.php');