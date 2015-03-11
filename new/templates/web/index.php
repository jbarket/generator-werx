<?php
namespace <%= root_namespace %>;
$app_dir = dirname(__DIR__);
// Use Composer's autoloader.
require_once $app_dir . '/vendor/autoload.php';
// Pass a couple options to our dispatcher.
$opts = ['app_dir' => $app_dir, 'namespace' => __NAMESPACE__];
$app = new \werx\Core\Dispatcher($opts);
// Dispatch the request.
$app->dispatch();