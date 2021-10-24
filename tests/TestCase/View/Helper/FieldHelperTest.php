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
        $params = [];  
        
        $this->Pessoas = $this->getTableLocator()->get('Pessoas', $config);
        $entity = $this->Pessoas->newEmptyEntity();  
        
        $result = $this->FieldHelper->formCreate($entity, $params);
        $this->assertNotEmpty($result);

    }
    
    public function testFieldHelperFieldCreateReadonlyInputs(): void {
        $config = [];
        $params = []; 
        $id = '1';
        
        $this->Pessoas = $this->getTableLocator()->get('Pessoas', $config);
        $entity = $this->Pessoas->get($id, []);  
        
        $result = $this->FieldHelper->textFieldCreate($entity, $params);
        $this->assertNotEmpty($result);

    }

}
