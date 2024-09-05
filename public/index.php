<?php
// Cargar el archivo de configuración
require_once './config/config.php';

// Autoload de controladores y modelos
spl_autoload_register(function ($class_name) {
    $controllerPath = './app/controllers/' . $class_name . '.php';
    $modelPath = './app/models/' . $class_name . '.php';

    if (file_exists($controllerPath)) {
        require_once $controllerPath;
    } elseif (file_exists($modelPath)) {
        require_once $modelPath;
    }
});

// Enrutamiento basado en la URL
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Si no hay controlador ni acción, redirigir a la página de inicio (home)
if (is_null($controllerName) && is_null($action)) {
    require './app/views/home.php';
} else {
    // Crear la instancia del controlador y ejecutar la acción
    $controller = new $controllerName();
    $controller->$action();
}
