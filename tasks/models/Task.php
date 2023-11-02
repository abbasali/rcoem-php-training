<?php

class Task {
    use BuildsQuery;
    
    public int $id;
    
    public string $description;
    
    public string $due_date;
    
    public bool $completed = false;
    
    public $table = 'tasks';
}