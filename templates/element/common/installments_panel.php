<?php

$installmentQtd = $this->request->getData('n_total_parcela') ?? 1;
for ($installmentQtdKey = 0; $installmentQtdKey < $installmentQtd; $installmentQtdKey++) {
    echo $this->Form->control("installments.{$installmentQtdKey}.n_parcela", ['type' => 'hidden', 'value' => $installmentQtdKey+1]);
    

    echo "<div class='row'>";
        echo "<div class='col-md-4'>";
            echo $this->Form->control("installments.{$installmentQtdKey}.vl_bruto", ['label' => 'Valor', 'class' => 'form-control', 'type' => 'text', 'value' => '0,00', 'maxlength' => '15']); 
        echo "</div>";
        echo "<div class='col-md-4'>";
            echo $this->Form->control("installments.{$installmentQtdKey}.dt_pagamento", ['label' => 'DT. pagamento', 'class' => 'form-control datepicker' , 'type' => 'datetime-local']); 
        echo "</div>";
        echo "<div class='col-md-4'>";
            echo $this->Form->control("installments.{$installmentQtdKey}.dt_vencimento", ['label' => 'DT. Vencimento', 'class' => 'form-control datepicker', 'type' => 'datetime-local']); 
        echo "</div>";
    echo "</div>";
};
?>
