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
            'stock' => $stock
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
    
        public function delete() {
            $id = $_POST['stockID'];
            $this->stockTable->delete($_POST['id']);
        
            header('location: /stock/home');
        }
        
        public function editSubmit(){
            $this->stockTable->save($_POST['stock']);
            header('location: /stock/home'); 
        }
        
        public function edit() {
            if (isset($_POST['stock'])) {
        
                $this->stockTable->save($_POST['stock']);
        
                header('location: /stock/home');
            }
            else {
                if  (isset($_GET['id'])) {
                    $result =  $this->stockTable->find('id', $_GET['id']);
                    $stock = $result[0];
                }
                else  {
                    $stock = false;
                }
        
                return [
                    'template' => 'stock.html.php',
                    'variables' => ['stock' => $stock],
                    'title' => 'Edit Category'
                ];
            }
        }
}
