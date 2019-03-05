<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JuegoPregunta Model
 *
 * @method \App\Model\Entity\JuegoPreguntum get($primaryKey, $options = [])
 * @method \App\Model\Entity\JuegoPreguntum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JuegoPreguntum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JuegoPreguntum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JuegoPreguntum|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JuegoPreguntum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JuegoPreguntum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JuegoPreguntum findOrCreate($search, callable $callback = null, $options = [])
 */
class JuegoPreguntaTable extends Table
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

        $this->setTable('juego_pregunta');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Juego', [
            'foreignKey' => 'idJuego',
            'joinType' => 'INNER'
        ]);

          $this->belongsTo('Pregunta', [
            'foreignKey' => 'idPregunta',
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('idJuego')
            ->requirePresence('idJuego', 'create')
            ->allowEmptyString('idJuego', false);

        $validator
            ->integer('idPregunta')
            ->requirePresence('idPregunta', 'create')
            ->allowEmptyString('idPregunta', false);

        return $validator;
    }
}
