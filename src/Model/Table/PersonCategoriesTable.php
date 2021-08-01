<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoPessoas Model
 *
 * @property \App\Model\Table\PessoasTable&\Cake\ORM\Association\HasMany $Pessoas
 *
 * @method \App\Model\Entity\TipoPessoa newEmptyEntity()
 * @method \App\Model\Entity\TipoPessoa newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TipoPessoa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoPessoa get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoPessoa findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TipoPessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoPessoa[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoPessoa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoPessoa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoPessoa[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoPessoa[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoPessoa[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoPessoa[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonCategoriesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('tipo_pessoas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Persons', [
            'foreignKey' => 'tipo_pessoa_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
                ->integer('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->scalar('tipo')
                ->maxLength('tipo', 255)
                ->requirePresence('tipo', 'create')
                ->notEmptyString('tipo');

        $validator
                ->integer('status')
                 ->maxLength('status', 1)
                ->notEmptyString('status');

        return $validator;
    }

}
