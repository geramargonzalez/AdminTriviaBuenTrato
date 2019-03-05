<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respuesta Model
 *
 * @method \App\Model\Entity\Respuestum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Respuestum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Respuestum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Respuestum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respuestum|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respuestum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Respuestum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Respuestum findOrCreate($search, callable $callback = null, $options = [])
 */
class RespuestaTable extends Table
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

        $this->setTable('respuesta');
        $this->setDisplayField('idRespuesta');
        $this->setPrimaryKey('idRespuesta');

        $this->belongsTo('Pregunta', [
            'foreignKey' => 'IdPregunta',
            'joinType' => 'INNER'
        ]);
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
            ->integer('idRespuesta')
            ->allowEmptyString('idRespuesta', 'create');

        $validator
            ->scalar('txtRespuesta')
            ->maxLength('txtRespuesta', 200)
            ->requirePresence('txtRespuesta', 'create')
            ->allowEmptyString('txtRespuesta', false);

        $validator
            ->boolean('correcta')
            ->requirePresence('correcta', 'create')
            ->allowEmptyString('correcta', false);

        $validator
            ->integer('IdPregunta')
            ->requirePresence('IdPregunta', 'create')
            ->allowEmptyString('IdPregunta', false);

        return $validator;
    }

    


}
