<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cashbacks Model
 *
 * @property \App\Model\Table\DealsTable&\Cake\ORM\Association\BelongsTo $Deals
 *
 * @method \App\Model\Entity\Cashback newEmptyEntity()
 * @method \App\Model\Entity\Cashback newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cashback[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cashback get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cashback findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cashback patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cashback[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cashback|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cashback saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cashback[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cashback[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cashback[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cashback[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CashbacksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cashbacks');
        $this->setDisplayField('cashback_id');
        $this->setPrimaryKey('cashback_id');

        $this->belongsTo('Deals', [
            'foreignKey' => 'deal_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('deal_id')
            ->allowEmptyString('deal_id');

        $validator
            ->decimal('cashback_percentage')
            ->requirePresence('cashback_percentage', 'create')
            ->notEmptyString('cashback_percentage');

        $validator
            ->scalar('cashback_description')
            ->allowEmptyString('cashback_description');

        $validator
            ->date('cashback_validity')
            ->allowEmptyDate('cashback_validity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('deal_id', 'Deals'), ['errorField' => 'deal_id']);

        return $rules;
    }
}
