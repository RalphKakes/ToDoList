<?php
require 'functions.php';


editTaskDur($_POST['editTaskDur'], $_POST['taskId']);
header('Location: index.php');