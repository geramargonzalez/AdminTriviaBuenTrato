<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Generales Model
 *
 * @method \App\Model\Entity\Generale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Generale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Generale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Generale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Generale|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Generale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Generale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Generale findOrCreate($search, callable $callback = null, $options = [])
 */
class GeneralesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('generales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('puntosPorPregunta')
            ->maxLength('puntosPorPregunta', 255)
            ->requirePresence('puntosPorPregunta', 'create')
            ->allowEmptyString('puntosPorPregunta', false);

        $validator
            ->scalar('fallo')
            ->maxLength('fallo', 255)
            ->requirePresence('fallo', 'create')
            ->allowEmptyString('fallo', false);

        $validator
            ->scalar('puntosTotales')
            ->maxLength('puntosTotales', 255)
            ->requirePresence('puntosTotales', 'create')
            ->allowEmptyString('puntosTotales', false);

        $validator
            ->scalar('time')
            ->maxLength('time', 255)
            ->requirePresence('time', 'create')
            ->allowEmptyString('time', false);

        $validator
            ->scalar('cantPreguntas')
            ->maxLength('cantPreguntas', 255)
            ->requirePresence('cantPreguntas', 'create')
            ->allowEmptyString('cantPreguntas', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        return $validator;
    }
}
