<?php

// autoload.php

spl_autoload_register(function ($className) {
    $namespace = 'Controller\\'; // Namespace for your controller classes
    $baseDir = __DIR__ . '/../controller/'; // Path to your controller directory

    $className = ltrim($className, '\\');
    $fileName = '';

    if (strpos($className, $namespace) === 0) {
        $className = substr($className, strlen($namespace));
        $fileName = $baseDir . str_replace('\\', '/', $className) . '.php';
    }

    if (file_exists($fileName)) {
        require $fileName;
    }
});
