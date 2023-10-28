<?php

require 'Task.php';
require 'functions.php';

$pdo = connectToDb();

$tasks = selectAll($pdo, 'tasks', 'Task');

require 'index.view.php';