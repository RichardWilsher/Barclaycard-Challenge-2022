<?php
namespace barclaycard\Controllers;
class admin {
    // Controller for the admin section of the site

    private $usersTable;

    public function __construct($usersTable) {
        // constructor function to assign all the relevant DatabaseTable objects to the required variables 
        // and populate the navElement variable with the admin area menu items, ensuring easy of maintainance
        $this->usersTable = $usersTable;
        $this->navElement = '';
    }

    public function login(){
        // function to display the login page
        // if the user is logged in, displays the welcome user page
        // otherwise displays the login page
        if (isset($_SESSION['loggedin'])){
            $user = $this->usersTable->find('id',$_SESSION['id'])[0];
            return ['template' => 'adminHome.html.php',
                'title' => 'Admin Area',
                'navElement' => $this->navElement,
                'openingHours' => [],
                'variables' => ['user' => $user]
            ];
        }
        else {
            header('location: /admin/adminHome');
            /*return ['template' => 'adminLogin.html.php',
                'title' => 'Admin Login',
                'navElement' => '',
                'openingHours' => [],
                'variables' => []
            ];*/
        }
    }

    public function loginSubmit(){
        // function to process when the submit button is pressed on the login page
        if (!isset($_SESSION['loggedin'])){
            $username = $_POST['name'];
        $password = $_POST['password'];
        if($this->usersTable->login($username, $password, 'name') == 1){
            // sends the username and password to the login function in DatabaseTable, if it returns 1, stores the id of the user in the $_SESSION as well as loggedin true
            $user = $this->usersTable->find('name', $username)[0];
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user->id;
        }
        header('location: /admin/login');
        } else {
            echo var_dump($_POST);
            if($_POST['page']=='stock'){
                header('location: /stock/home');
            } else {
                if($_POST['page']=='customers'){
                    header('location: /client/home');
                } else {
                    header('location: /store/home');
                }
            }
        }
    }

    public function logout(){
        // unsets the $_SESSION variables so a user will need to login again to access the admin area
        unset($_SESSION['loggedin']);
        unset($_SESSION['id']);
        header('location: /admin/login');
    }
    public function register(){
        $user = [];
        if (isset($_GET['errors'])){
            $errors = $_GET['errors'];
        } else {
            $errors = 0;
        }
        return ['template' => 'adminregister.html.php',
        'title' => 'Login/Register',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'user' => $user,
            'errors' => $errors
        ]
            ];
    }

    public function validateRegistration($user,$checkPassword) {
        // function to validate the user input when adding a new user or editing a users details
        $errors = 0;

        if ($user['name'] == '') {
            $errors = 1;
        }
        if ($user['password'] == '') {
            if ($errors ==0){
                $errors = 2;
            } else {
                $errors = 3;
            }
        } 
        if ($user['password'] != $checkPassword){
            $errors = 4;
        }

        return $errors;
        }

    public function registerSubmit(){
        unset($_POST['submit']);
        $checkPassword = $_POST['password2'];
        unset($_POST['password2']);
        $user = $_POST;
        // validate the users input to ensure the username and password are not left blank
        $errors = $this->validateRegistration($user,$checkPassword);
        if ($errors == 0) {
            // add or update the user to the database
            $hash = password_hash($user['password'], PASSWORD_DEFAULT);
            $user['password'] = $hash;

            if ($user['id'] == ''){
                $user['id'] = null;
            }

            $this->usersTable->save($user);
            header('location: /admin/login');
        } else {
            // if there are errors redirect back to the page and display the errors
            header('location: /admin/adminregister?errors=' . $errors);
        }
    }

    public function adminHome(){
        return ['template' => 'adminHome.html.php',
            'title' => 'Admin Login',
            'navElement' => '',
            'openingHours' => [],
            'variables' => []
        ];
    }

    public function adminHomeSubmit(){
        echo var_dump($_POST);
        if($_POST['page']=='stock'){
            header('location: /stock/home');
        } else {
            if($_POST['page']=='customers'){
                header('location: /client/home');
            } else {
                header('location: /store/home');
            }
        }
    }
}
