<?php

declare(strict_types=1);

namespace App\Controller;

class FileLogsController extends AppController {

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

}
