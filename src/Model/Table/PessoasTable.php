<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TipoPessoasTable&\Cake\ORM\Association\BelongsTo $TipoPessoas
 *
 * @method \App\Model\Entity\Pessoa newEmptyEntity()
 * @method \App\Model\Entity\Pessoa newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pessoa findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pessoa[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PessoasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('pessoas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TipoPessoas', [
            'foreignKey' => 'tipo_pessoa_id',
            'joinType' => 'INNER',
        ]);
    }

    public function beforeSave($event) {
        $entity = $event->getData('entity');
        if(empty($entity->pessoa['created_by'])){
           
         $entity->Pessoa['created_by'] = '1';
         debug($entity);
        }
        
        return true;
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
                ->scalar('nome')
                ->maxLength('nome', 255)
                ->requirePresence('nome', 'create')
                ->notEmptyString('nome');

        $validator
                ->email('email')
                ->allowEmptyString('email');

        $validator
                ->scalar('cpf')
                ->maxLength('cpf', 12)
                ->allowEmptyString('cpf');

        $validator
                ->scalar('datanascimento')
                ->maxLength('datanascimento', 12)
                ->allowEmptyString('datanascimento');

        $validator
                ->scalar('cep')
                ->maxLength('cep', 12)
                ->allowEmptyString('cep');

        $validator
                ->scalar('uf')
                ->maxLength('uf', 2)
                ->allowEmptyString('uf');

        $validator
                ->scalar('pais')
                ->maxLength('pais', 75)
                ->allowEmptyString('pais');

        $validator
                ->scalar('endereco')
                ->maxLength('endereco', 255)
                ->allowEmptyString('endereco');

        $validator
                ->scalar('numero')
                ->maxLength('numero', 25)
                ->allowEmptyString('numero');

        $validator
                ->scalar('cidade')
                ->maxLength('cidade', 255)
                ->allowEmptyString('cidade');

        $validator
                ->integer('ddd')
                ->allowEmptyString('ddd');

        $validator
                ->integer('telefone')
                ->allowEmptyString('telefone');

        $validator
                ->integer('status')
                ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['tipo_pessoa_id'], 'TipoPessoas'), ['errorField' => 'tipo_pessoa_id']);

        return $rules;
    }
}
