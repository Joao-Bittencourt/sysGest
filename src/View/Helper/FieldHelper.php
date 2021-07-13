<?php

namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper;

class FieldHelper extends HtmlHelper {

    public $helpers = ['Html', 'Form'];

    public function formCreate($entity, $params) {

        $formFields = [];

        foreach ($entity->getAccessible() as $field => $value) {

            $optionsFields = [];

            switch ($field) {
                case 'created':
                case 'created_by':
                case 'modified':
                case 'modified_by':
                    break;
                default:
                    $optionsFields = ['label' => $field, 'class' => 'form-control'];
                    $formFields[] = $this->Form->control($field, $optionsFields);
            }
        }
        return $formFields;
    }

}
