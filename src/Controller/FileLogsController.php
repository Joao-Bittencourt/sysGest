<?php

declare(strict_types=1);

namespace App\Controller;

class FileLogsController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->loadComponent('Seeder');
    }
    
    public function error() {

        echo '<pre>';
        print_r(file_get_contents(LOGS . DS . 'error.log'));
        echo '</pre>';
        die();
    }

    public function debug() {
        echo '<pre>';
        print_r(file_get_contents(LOGS . DS . 'debug.log'));
        echo '</pre>';
        die();
    }

    public function seeder($entitySeedName = '', $quantity = 1) {
        
        switch ($entitySeedName) {
            case 'payments' :
                $this->Seeder->$entitySeedName($entitySeedName, $quantity);
                break;
            default:
                die('^_^');
        }
        
        print_r(__('Dados salvos com sucesso!'));
        die();   
    }
}
