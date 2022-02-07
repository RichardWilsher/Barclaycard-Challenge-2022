<?php
namespace barclaycard\Controllers;
class stock {
    // controller for the car section of the site which is the public facing site
    
    private $stockTable;
    public function __construct($stockTable) {
        // constructor function to assign all the relevant DatabaseTable objects to the required variables 
        $this->stockTable = $stockTable;
    }

    public function home() {
        // function to display the home page
        $stock = $this->stockTable->findAll();
        return ['template' => 'stock.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'users' => $stock
        ]
            ];
    }

    public function updateSubmit() {
        // function to display the shopping page
        $stock = $this->stockTable->update();
        return ['template' => 'stock.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'stock' => $stock
        ]
            ];
        }
    }

    public function deleteSubmit() {
        // function to display the shopping page
        $stock = $this->stockTable->delete();
        return ['template' => 'stock.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'stock' => $stock
        ]
            ];
        }
    }

    public function searchSubmit() {
        // function to display the shopping page
        $stock = $this->stockTable->update();
        return ['template' => 'stock.html.php',
        'title' => 'Stock',
        'navElement' => '',
        'openingHours' => [],
        'variables' => [
            'stock' => $stock
        ]
            ];
        }
    }