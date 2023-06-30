<?php

namespace Intetics\MvcTask\Model;

class Post extends Model
{
    private string $tableName = 'posts';
    protected string $text;

    public function __construct($text)
    {
        parent::__construct();
        $this->id = uniqid();
        $this->text = $text;
    }

    public function getText() : string
    {
        return $this->text;
    }

    function getTableName(): string
    {
        return $this->tableName;
    }
}