<?php
namespace barclaycard;

class Routes implements \tools\Routes{

    public function getController($name) {
        // function to create the DatabaseTable object instances and the Controller instances and return the requested controller
        require '../database.php';
        
        $userTable = new \tools\DatabaseTable($pdo, 'users', 'id');
        $stockTable = new \tools\DatabaseTable($pdo, 'stock', 'id');

        $controllers = [];
        
        $controllers['store'] = new \barclaycard\Controllers\store($userTable, $stockTable);
        $controllers['admin'] = new \barclaycard\Controllers\admin($userTable, $stockTable);
        
        return $controllers[$name];
    }
    
    public function getDefaultRoute() {
        // function to return the default route if no route is supplied
        return 'store/home';
    }

    public function checkLogin($route) {
        // function to check if being logged in is required for a particular page
        // if being logged in is required, will check if a user is logged in and allow them to continue to the page if so
        // if not will redirect them to the login page
        session_start();
        $loginRoutes = [];

        $requiresLogin = $loginRoutes[$route] ?? false;

        if ($requiresLogin && !isset($_SESSION['loggedin'])) {
            header('location: /admin/login');
            exit();
        }
    }
}