<?php
include("app/APIchannel.php");

echo "setting Channel...\n";
$api = new APIchannel();
$api->in = $argv[1];
$api->out = $argv[2];
$api->start();
