<?php
echo "setting API threads...\n";
exec('php setChannel.php "'.$argv[1].'" "'.$argv[2].'" > logChannel.txt 2&>1 &');
exec('php setConsumer.php "'.$argv[2].'" "'.$argv[3].'" > logConsumer.txt 2>&1 &');
