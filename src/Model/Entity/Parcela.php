<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Parcela extends Entity {

    protected $_accessible = [
        'id' => true,
//        '' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'status' => true,
    ];

}
