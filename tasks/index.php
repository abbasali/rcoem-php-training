<?php

require 'includes/bootstrap.php';

$tasks = Task::query()->selectAll();

Task::query()->create([
    'description' => 'my desc',
    'due_date' => '2023-10-23',
    'completed' => 0,
]);

require 'views/index.view.php';