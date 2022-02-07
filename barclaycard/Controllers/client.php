<?php
namespace barclaycard\Controllers;
class client {
    // controller for the car section of the site which is the public facing site
    
    private $clientTable;
    public function __construct($clientTable) {
        // constructor function to assign all the relevant DatabaseTable objects to the required variables 
        $this->clientTable = $clientTable;
    }

    public function home() {
        // function to display the home page
        $customers = $this->clientTable->findAll();
        return ['template' => 'customers.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'customers' => $customers
        ]
            ];
    }

    public function updateSubmit() {
        // function to display the shopping page
        $customers = $this->clientTable->update();
        return ['template' => 'customers.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'customers' => $customers
        ]
            ];
        }
    

    public function deleteSubmit() {
        // function to display the shopping page
        $customers = $this->clientTable->delete();
        return ['template' => 'customers.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'customers' => $customers
        ]
            ];
        }
    

    public function searchSubmit() {
        // function to display the shopping page
        $customers = $this->clientTable->update();
        return ['template' => 'customers.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'customers' => $customers
        ]
            ];
        }
    }