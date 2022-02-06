<?php
namespace tools;
class EntryPoint {
    private $routes;

    public function __construct(Routes $routes) {
        // constructor
            $this->routes = $routes;
    }

    public function run() {
        // function to display a given template 
            $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
            
            // call to function to check if a user is required to be logged in to visit the page 
            $this->routes->checkLogin($route);

            if ($route == '') {
                $route = $this->routes->getDefaultRoute();
            } 
            
            list($controllerName, $functionName) = explode('/', $route);
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $functionName = $functionName . 'Submit';
            }

            $controller = $this->routes->getController($controllerName);
            
            $page = $controller->$functionName();

            $navElement = $page['navElement'];

            $openingHours = $page['openingHours'];
    
            $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);

            $title = $page['title'];

            

            require '../templates/layout.html.php';
        }

    public function loadTemplate($fileName, $templateVars) {
        // function to buffer the output of the template file before sending back to run()
        extract($templateVars);
        ob_start();
        require $fileName;
        $contents = ob_get_clean();
        return $contents;   
    }
}