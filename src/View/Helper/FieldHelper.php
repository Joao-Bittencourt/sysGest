<?php

namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper;

class FieldHelper extends HtmlHelper {

    public $helpers = ['Html', 'Form'];

    public function formCreate($entity, $params = []) {

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
                    $optionsFields += $params;

                    $formFields[] = $this->Form->control($field, $optionsFields);
            }
        }
        return $formFields;
    }

    public function textFieldCreate($entity, $params = []) {

        $textFields = [];

        $formFields = '<div class="row">';
        foreach ($entity->getAccessible() as $field => $value) {
            $fieldName = '';
            switch ($field) {
                case 'created':
                    $fieldName = 'DT Cadastrado';
                    break;
                case 'created_by':
                case 'modified':
                case 'modified_by':
                    break;
                default:
                    $fieldName = \Cake\Utility\Inflector::humanize($field);
            }
           
            if ($fieldName) {
                $formFields .= "<div class='col-6'>
                    <label for='{$field}'>{$fieldName}</label>
                    <input type='text' name='{$field}' class='form-control' value= '{$entity->{$field}}' readonly>
                    </div>";
            }
        }

        $formFields .= '</div>';

        return $formFields;
    }

}
