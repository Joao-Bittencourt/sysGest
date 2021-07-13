<?php

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\FieldHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class FieldHelperTest extends TestCase {

    public function setUp(): void {
        parent::setUp();
        $View = new View();
        $this->FieldHelper = new FieldHelper($View);
    }

    public function testFieldHelperCreateAllInputs(): void {
        $config = [];
        $this->Pessoas = $this->getTableLocator()->get('Pessoas', $config);
        $entity = $this->Pessoas->newEmptyEntity();  
        $params = [];        
        
        $result = $this->FieldHelper->formCreate($entity, $params);
        $this->assertNotEmpty($result);

    }

}
