<?php


require 'functions.php';

deleteTask($_GET['taskId']);
header('Location: index.php');

