<?php
    /**
     * Import
     */
    define("root_path", $_SERVER['DOCUMENT_ROOT']."/blabla-cine");
    define("template_path", root_path."/app/templates");
    define("base_uri", "http://localhost/blabla-cine");
    require_once('vendor/autoload.php');
    use App\helpers\Database;
    use App\Route;
    use Dotenv\Dotenv;
    /**
     * Initialisation
     */
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $GLOBALS['db'] = new Database($_ENV['DATABASE_HOST'], $_ENV['DATABASE_TABLE'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
    $router = new Route();
    /**
     * Définition des routes
     */
    $router->get('/', 'HomeController', 'welcome');
    $router->get('/detail/', 'MovieController', 'detail');
    $router->get('/recherche/', 'MovieController', 'search');
    /**
     * Execute
     */
    $router->run($_SERVER['PATH_INFO'] ?? '/');
?>