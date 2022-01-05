<?php

namespace Cake\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class SeederComponent extends Component {

    public function payments($entitySeedName, $qtd = 10) {

        $entitySeedName = 'Payments';

        $entityTable = TableRegistry::getTableLocator()->get($entitySeedName);
        $arPersonsid = $entityTable->Persons->find('list')->toArray();
        $arAcconstid = $entityTable->Accounts->find('list')->toArray();
        $arTipoPagamento = ['C' => 'C', 'D' => 'D'];

        $paymentsCount = 0;
        while( $paymentsCount < $qtd) {
            $dataPayment = [
                'recebedor_pessoa_id' => array_rand($arPersonsid),
                'conta_id' => array_rand($arAcconstid),
                'tipo_pagamento_tipo' => array_rand($arTipoPagamento),
                'n_total_parcelas' => rand(1, 12),
                'vl_total' => rand(1, 10000) / 100,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => null,
                'status' => 1
            ];
            $paymentsCount++;
            
            $installment = 0;
            while ($installment < $dataPayment['n_total_parcelas']) {
                $installment++;

                $valorParcela = number_format(($dataPayment['vl_total'] / $dataPayment['n_total_parcelas']), 2, ',', '');

                $dataInstalment[] = [
                    'n_parcela' => $installment,
                    'vl_bruto' => $valorParcela,
                    'vl_liquido' => $valorParcela,
                    'vl_desc' => 0,
                    'p_desc' => 0,
                    'vl_acrescimo' => 0,
                    'p_acrescimo' => 0,
                    'dt_vencimento' => date('Y-m-d H:i:s', strtotime('+1 month')),
                    'dt_pagamento' => date('Y-m-d H:i:s', strtotime('+1 week')),
                    'created' => date('Y-m-d H:i:s'),
                    'created_by' => 1,
                    'modified' => date('Y-m-d H:i:s'),
                    'modified_by' => null,
                    'status' => 1
                ];
            }
            $dataPayment['installments'] = $dataInstalment;
            
            $entityTable2 = TableRegistry::getTableLocator()->get($entitySeedName);
            $entity = $entityTable2->newEntity($dataPayment, ['associated' => 'Installments']);

            $entityTable2->save($entity);
            unset($entity);
            unset($entityTable2);
            unset($dataPayment);
            unset($dataInstalment);
        }
    }

}
