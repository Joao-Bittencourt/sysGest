<?php

declare(strict_types=1);

namespace App\Controller;

class ReportsController extends AppController {

    public function index() {

       $entrys = $this->Reports->Payments->findDataEntrys();
       $outputs = $this->Reports->Payments->findDataOutputs();
       
       $this->set('entrys', $entrys);
       $this->set('outputs', $outputs);
    }

}
