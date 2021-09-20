<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Payment extends Entity {

    protected $_accessible = [
        'id' => true,
        'conta_id' => true,
        'recebedor_pessoa_id' => true,
        'vl_total' => true,
        'n_total_parcelas' => true,
        'tipo_pagamento_tipo' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'status' => true,
    ];

}
