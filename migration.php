<?php

require_once 'config/app.php';
require_once 'vendor/autoload.php';

use Intetics\MvcTask\Core\Connection;

$conn = Connection::getInstance();

$query = "CREATE TABLE IF NOT EXISTS posts (id  VARCHAR(255) PRIMARY KEY,text TEXT) ENGINE=INNODB";

$stmt = $conn->prepare($query);

if ($stmt->execute()){
    echo "Migration successfully run.";
}
else {
    echo "Migration failed.";
}