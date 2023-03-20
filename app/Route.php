<?php 
    namespace App;
    use App\controllers;

    class Route {
        private static Array $routes;

        public function __construct()
        {
            self::$routes = [];
        }

        public function get(String $uri, String $controller, String $action){
            $this->addRoute('GET', $uri, $controller, $action);
        }

        public function post(String $uri, String $controller, String $action){
            $this->addRoute('POST', $uri, $controller, $action);
        }

        private function addRoute(String $method, String $uri, String $controller, String $action){
            self::$routes[$uri] = [
                'method'     => $method,
                'controller' => $controller,
                'action'     => $action
            ];
        }

        public function run(String $uri){
            $selectedRoute = self::$routes[$uri] ?? null;
            $class = 'App\\controllers\\'.(!is_null($selectedRoute) 
                ? $selectedRoute['controller'] 
                : '');
            match(true){
                !key_exists($uri, self::$routes)                         => (new controllers\Controller())->err(404),
                $_SERVER['REQUEST_METHOD']  !== $selectedRoute['method'] => (new controllers\Controller())->err(405),
                default                                                  => (new $class())->{$selectedRoute['action']}(),
            };
            die();
        }

    }
   
    

?>