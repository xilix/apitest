##API test suite##

Just tring to show different way to use automatic test in a distribuited architecture connected by an API

###It requires:###

* phpunit
* curl for php
* a runing server
* php cli

On test/apiTest.php change $serverUrl to whereever is pointing your server 

app is just a simple simulation of a distributed application that is talking to all it's parts through an API. setApi & Co is to simulate the sistem runing on meanwhile the test is launched.

###Run the tests###

From the repo root directory run on the shell terminal `phpunit test/apiTest.php`

profit /(^o^)/ \(^o^)\
