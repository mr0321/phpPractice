<?php
//Adjust some settings if necessary
//view them
//phpinfo();
//Set memory limit
//ini_set('memory_limit', '225M');
//Check memory limit
//echo ini_get('memory_limit');

include __DIR__.'/../src/App/functions.php';

$app = include __DIR__.'/../src/App/bootstrap.php';
$app -> run();

//dd($app);
?>