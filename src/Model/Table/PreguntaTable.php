<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pregunta Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Preguntum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Preguntum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Preguntum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Preguntum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Preguntum|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Preguntum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Preguntum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Preguntum findOrCreate($search, callable $callback = null, $options = [])
 */
class PreguntaTable extends Table
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

        $this->setTable('pregunta');
        $this->setDisplayField('idPregunta');
        $this->setPrimaryKey('idPregunta');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('Nivel', [
            'foreignKey' => 'IdNivel',
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
            ->integer('idPregunta')
            ->allowEmptyString('idPregunta', 'create');

        $validator
            ->scalar('txtPregunta')
            ->maxLength('txtPregunta', 200)
            ->requirePresence('txtPregunta', 'create')
            ->allowEmptyString('txtPregunta', false);

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 1000)
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);
        $validator
            ->integer('IdNivel')
            ->requirePresence('IdNivel', 'create')
            ->allowEmptyString('IdNivel', false);

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', true);

        $validator
            ->integer('cantRespuestas')
            ->requirePresence('cantRespuestas', 'create')
            ->allowEmptyString('cantRespuestas', false)
            ->add('cantRespuestas', 'minMaxDeRespuestas', [
                  'rule' => function ($data, $provider) {
                  if ($data > 1) {return true;} else {
                  return 'La cantidad de respuestas debe ser mayor a 1';
                  }if ($data < 6) {return true;} else {return 'La cantidad de respuestas debe ser menor a 6';}    
                }]);

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status', 'create');
        
        return $validator;
    }
    /*
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

    public function findStatus(Query $query, array $options)
    {
         return $query->where(['status' => true]);
    }

}
