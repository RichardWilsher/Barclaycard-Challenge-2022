<?php
namespace barclaycard\Controllers;
class store {
    // controller for the car section of the site which is the public facing site
    
    private $clientTable;
    private $stockTable;

    public function __construct($clientTable, $stockTable) {
        // constructor function to assign all the relevant DatabaseTable objects to the required variables 
        $this->clientTable = $clientTable;
        $this->stockTable = $stockTable;
    }

    public function home() {
        // function to display the home page
        
        //$users = $this->clientTable->findall();
        return ['template' => 'home.html.php',
        'title' => 'Home',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
           
        ]
            ];
    }

    public function shop() {
        // function to display the shopping page
        $stock = $this->stockTable->findall();
        return ['template' => 'shop.html.php',
        'title' => 'Our range',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'stock' => $stock
        ]
            ];
    }

    public function shopSubmit(){
        unset($_POST['submit']);
        if($_POST['quantity'] > 0){
            $stockItem = $_POST;
        }
        if (isset($_SESSION['basket'])){
            $tempBasket = $_SESSION['basket'];
        } else {
            $tempBasket = [];
        }
        array_push($tempBasket, $_POST);
        $_SESSION['basket'] = $tempBasket;
        //echo var_dump($_SESSION);
        header('location: /store/shop');
    }

    public function about() {
        // function to display the About page
        return ['template' => 'about.html.php',
        'title' => 'About us',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [

        ]
            ];
    }

    public function contact() {
        return ['template' => 'contact.html.php',
        'title' => 'Contact us',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [

        ]
            ];
    }

    public function payment() {
        return ['template' => 'payment.html.php',
        'title' => 'payment',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
        ]
            ];
    }

    public function paymentSubmit(){
        unset($_POST['submit']);
        $_SESSION['transaction'] = $_POST;
        //echo var_dump($_SESSION['transaction']);
        //echo var_dump($this->transaction);
        header('location: /store/processing');
    }

    public function processing(){
        //$transaction[] = $_SESSION['transaction'];
        $transaction = $_SESSION['transaction'];
        $transaction['unsigned_field_names'] = '';
        return ['template' => 'payment2.html.php',
        'title' => 'Processing',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'transaction' => $transaction
        ]
            ]; 
    }

    public function basket(){
        $fullBasket = [];
        if(isset($_GET['action'])){
            unset($_SESSION['basket']);
            //$fullBasket = 'empty';
        } else {
        if (isset($_SESSION['basket'])){
            $basket = $_SESSION['basket'];
        foreach($basket as $basketItem){
            $stockItem = $this->stockTable->find('id',$basketItem['id'])[0];
            $newItem['name'] = $stockItem->name;
            $newItem['price'] = $stockItem->price;
            $newItem['quantity'] = $basketItem['quantity'];
            array_push($fullBasket,$newItem);
        }
    }
    }
        return ['template' => 'basket.html.php',
        'title' => 'basket',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'basket' => $fullBasket
        ]
            ];
    }

    public function return(){
        echo var_dump($_POST);
    }

    public function login(){
        if (isset($_SESSION['loggedin'])){
            $user = $this->clientTable->find('id',$_SESSION['id'])[0];
        } else {
            $user = [];
        }
        return ['template' => 'login.html.php',
        'title' => 'Login/Register',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'user' => $user
        ]
            ];
    }

    public function loginSubmit(){
    // function to process when the submit button is pressed on the login page
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($this->clientTable->login($email, $password) == 1){
    // sends the username and password to the login function in DatabaseTable, if it returns 1, stores the id of the user in the $_SESSION as well as loggedin true
        $user = $this->clientTable->find('email', $email)[0];
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $user->id;
        }
        header('location: /store/home');
    }

    public function logout(){
        unset($_SESSION['loggedin']);
        unset($_SESSION['id']);
        header('location: /store/home');
    }

    public function register(){
        $user = [];
        if (isset($_GET['errors'])){
            $errors = $_GET['errors'];
        } else {
            $errors = 0;
        }
        return ['template' => 'register.html.php',
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

        if ($user['email'] == '') {
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

            $this->clientTable->save($user);
            header('location: /store/register');
        } else {
            // if there are errors redirect back to the page and display the errors
            header('location: /store/register?errors=' . $errors);
        }
    }

    public function clearBasket(){
        unset($_SESSION['basket']);
        header('location: /store/shop');
    }

}

?>