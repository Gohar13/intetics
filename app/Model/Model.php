<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Model;

use Intetics\MvcTask\Core\Connection;
use ReflectionProperty;

abstract class Model {

    private \PDO $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function load_model($model){
        $model = ucwords($model);
        $modelFilePath = sprintf("app/Model/%s.php", $model);
        if (is_file($modelFilePath)) {
            require_once $modelFilePath;
            if (class_exists($model)) {
                return new $model();
            } else {
                die("Undefined {$model} Model");
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function save() {

        $class = new \ReflectionClass($this);
        $tableName = $this->getTableName();

        $propsToImplode = [];
        $bindings = [];

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED) as $property) {
            $propertyName = $property->getName();
            $propsToImplode[] = "$propertyName = :$propertyName";
            $bindings[$propertyName] = $this->{$propertyName};
        }

        $propsToImplode[] = 'id = :id';
        $bindings['id'] = $this->id;

        $setClause = implode(',',$propsToImplode);

        $sqlQuery = 'INSERT INTO `'.$tableName.'` SET '.$setClause;

        try {
            $statement = $this->conn->prepare($sqlQuery);
            foreach ($bindings as $key => $value) {
                $statement->bindValue($key, $value);
            }
            $statement->execute();

            return $this;
        } catch (\PDOException $e) {
            echo $e->getMessage();die;
        }

    }

    abstract function getTableName(): string;
}