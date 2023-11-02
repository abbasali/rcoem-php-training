<?php

class QueryBuilder {
    
    public PDO $pdo;
    
    public Object $model;
    
    public function __construct(PDO $pdo, Object $model)
    {
        $this->pdo = $pdo;
        $this->model = $model;
    }
    
    public function selectAll()
    {
        $statement = $this->pdo->prepare('select * from ' . $this->model->table);

        $statement->execute();

        return $statement->fetchAll(
            PDO::FETCH_CLASS,
            get_class($this->model)
        );
    }

    public function create(array $fields)
    {
        $sql = "INSERT INTO {$this->model->table} SET ";
        
        foreach ($fields as $field => $value) {
            $fieldValues[] = "$field = '$value'";
        }
        
        $sql .= implode(', ', $fieldValues);
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        
        return $this->pdo->lastInsertId();
    }
}