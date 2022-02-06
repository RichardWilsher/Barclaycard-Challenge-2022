<?php
namespace barclaycard\Controllers;
class test {
    // controller for the car section of the site which is the public facing site
    
    private $userTable;
    public function __construct($userTable) {
        // constructor function to assign all the relevant DatabaseTable objects to the required variables 
        $this->userTable = $userTable;
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
        return ['template' => 'shop.html.php',
        'title' => 'Our range',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [

        ]
            ];
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

}
?>