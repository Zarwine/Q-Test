<?php

$credential = [
    'dev'  => 'sqlite:'.dirname(__DIR__).'/database/database_dev/QW.sqlite',
    'test' => 'sqlite:'.dirname(__DIR__).'/database/database_test/QW.sqlite'
];

define("DEVDB", $credential["dev"]);
define("TESTDB", $credential["test"]);
