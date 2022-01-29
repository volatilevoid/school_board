<?php

require __DIR__ . '/vendor/autoload.php';

// CLI create table
$db = new App\Database();
$db->createTable();

?>