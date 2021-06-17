<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $email
 * @property string|null $cpf
 * @property string|null $datanascimento
 * @property string|null $cep
 * @property string|null $uf
 * @property string|null $pais
 * @property string|null $endereco
 * @property string|null $numero
 * @property string|null $cidade
 * @property int|null $ddd
 * @property int|null $telefone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $status
 * @property int $tipo_pessoa_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\TipoPessoa $tipo_pessoa
 */
class Pessoa extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'email' => true,
        'cpf' => true,
        'datanascimento' => true,
        'cep' => true,
        'uf' => true,
        'pais' => true,
        'endereco' => true,
        'numero' => true,
        'cidade' => true,
        'ddd' => true,
        'telefone' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'user_id' => true,
        'status' => true,
        'tipo_pessoa_id' => true,
        'user' => true,
        'tipo_pessoa' => true,
    ];

}
