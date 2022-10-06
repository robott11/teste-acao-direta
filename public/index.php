<?php
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class)) . '.php';
    require($path);
});

require __DIR__ . '/../app/helpers.php';
require __DIR__ . '/../routes/web.php';

$kernel = new App\Kernel\App;
$kernel->run()->sendResponse();