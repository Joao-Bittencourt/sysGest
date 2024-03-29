<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class PaymentTransaction extends Entity {

    protected $_accessible = [
        'id' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'status' => true,
    ];

}
