<?php
namespace barclaycard\Controllers;
class store {
    // controller for the car section of the site which is the public facing site
    
    private $userTable;
    public function __construct($userTable, $stockTable) {
        // constructor function to assign all the relevant DatabaseTable objects to the required variables 
        $this->userTable = $userTable;
        $this->stockTable = $stockTable;
    }

    public function home() {
        // function to display the home page
        $users = $this->userTable->findall();
        return ['template' => 'home.html.php',
        'title' => 'Home',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'users' => $users
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
        //$tempBasket += $_POST
        header('location: /store/processing');
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
        header('location: /store/processing');
    }

    public function processing(){
        return ['template' => 'payment2.html.php',
        'title' => 'Processing',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
        ]
            ]; 
    }

}
?>