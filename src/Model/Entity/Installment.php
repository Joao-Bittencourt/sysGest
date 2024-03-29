<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Installment extends Entity {

    protected $_accessible = [
        '*' => true
//        'id' => true,
//        'pagamento_id' => true,
//        'n_parcela' => true,
//        'vl_bruto' => true,
//        'created' => true,
//        'created_by' => true,
//        'modified' => true,
//        'modified_by' => true,
//        'status' => true,
    ];

    public function initialize(array $config): void {

        $this->belongsTo('Payments', [
            'className' => 'Payments'
        ]);
    }

}
