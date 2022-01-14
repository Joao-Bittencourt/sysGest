<?php

namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper;

class FieldHelper extends HtmlHelper {

    public $helpers = ['Html', 'Form'];

    public function formCreate($entity, $params = []): string {

        $form = [];
        $formFields = [];

        $form = $this->Form->create($entity);

        foreach ($entity->getAccessible() as $field => $value) {

            $optionsFields = [];

            switch ($field) {

                case 'id':
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

        $form .= implode($formFields);
        return $form;
    }

    public function textFieldCreate($entity, $params = []): string {

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

    // @todo: move to specific class
    public function elementPaginator($paginator): string {

        $paginator->setTemplates([
            'first' => '<a href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-double-left"></i></a>',
            'prevActive' => '<a rel="prev" href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-left"></i></a>',
            'prevDisabled' => '<a href="" onclick="return false;" class="btn btn-outline-primary  btn-sm disabled"><i class="bi bi-chevron-left"></i></a>',
            'nextActive' => '<a rel="next" href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-right"></i></a>',
            'nextDisabled' => '<a href="" onclick="return false;" class="btn btn-outline-primary  btn-sm disabled"><i class="bi bi-chevron-right"></i></a>',
            'last' => '<a href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-double-right"></i></a>',
        ]);
        
        $links = [
            $paginator->first(),
            $paginator->prev(),
            $paginator->next(),
            $paginator->last()
        ];
        
        $paginate = $this->Html->nestedList($links, ['class' => 'pagination'], ['class' => 'page-item']);
        $paginate = $this->Html->tag('nav', $paginate);
        $paginateCount = $paginator->counter('pagina {{page}} de {{pages}}, mostrando {{current}} registros de {{count}}');
        
        $paginateBar = $this->Html->div('row',
                $this->Html->div('col-md-8 text-left mb-1', $paginateCount) .
                $this->Html->div('col-md-4 ', $paginate)
        );
        return $paginateBar;
    }
}