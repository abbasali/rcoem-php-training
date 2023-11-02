<?php

trait BuildsQuery {
    public static function query(): QueryBuilder
    {
        return new QueryBuilder(DbConnection::make(), new self);
    }
}