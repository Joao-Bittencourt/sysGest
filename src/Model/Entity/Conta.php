<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Conta extends Entity {

    protected $_accessible = [
        'id' => true,
        'banco_id' => true,
        'pessoa_id' => true,
        'agencia' => true,
        'agencia_dv' => true,
        'conta' => true,
        'conta_dv' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'status' => true,
    ];

}
