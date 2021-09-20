<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Locator\TableLocator;

class ReportsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);
        
        $this->belongsTo('Payments', [
            'className' => 'Payments',
            'foreignKey' => false,
        ]);
        
    }
     
}
