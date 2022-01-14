<?php

$this->Paginator->setTemplates([
    'first' => '<a href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-double-left"></i></a>',
    
    'prevActive' => '<a rel="prev" href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-left"></i></a>',
    'prevDisabled' => '<a href="" onclick="return false;" class="btn btn-outline-primary  btn-sm disabled"><i class="bi bi-chevron-left"></i></a>',
    
    'nextActive' => '<a rel="next" href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-right"></i></a>',
    'nextDisabled' => '<a href="" onclick="return false;" class="btn btn-outline-primary  btn-sm disabled"><i class="bi bi-chevron-right"></i></a>',
    
    'last' => '<a href="{{url}}" class="btn btn-outline-primary  btn-sm" update="#content"><i class="bi bi-chevron-double-right"></i></a>',
]);
$links = [
    $this->Paginator->first(),
    $this->Paginator->prev(),
    $this->Paginator->next(),
    $this->Paginator->last()
];
$paginate = $this->Html->nestedList($links, ['class' => 'pagination'], ['class' => 'page-item']);
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    'pagina {{page}} de {{pages}}, mostrando {{current}} registros de {{count}}'
);
$paginateBar = $this->Html->div('row text-muted', 
    $this->Html->div('col-md-8 text-left mb-1', $paginateCount) .
    $this->Html->div('col-md-4 ', $paginate) 
);
echo $paginateBar;


echo $this->fetch('contentPage'); 