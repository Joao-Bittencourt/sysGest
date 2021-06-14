<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Banco extends Entity {

    protected $_accessible = [
        'nome' => true,
        'codigo_banco' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'status' => true,
    ];

}
