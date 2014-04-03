<?php
include("app/consumer.php");

echo "setting consumer...\n";
$consumer = new Consumer();
$consumer->file = $argv[1];
$consumer->result = $argv[2];
$consumer->consume();
