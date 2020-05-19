<?php
require 'functions.php';


editTaskStatus($_POST['editTaskStatus'], $_POST['taskId']);
header('Location: index.php');
