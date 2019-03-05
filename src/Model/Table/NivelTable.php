<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nivel Model
 *
 * @method \App\Model\Entity\Nivel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nivel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nivel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nivel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nivel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nivel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nivel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nivel findOrCreate($search, callable $callback = null, $options = [])
 */
class NivelTable extends Table
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

        $this->setTable('nivel');
        $this->setDisplayField('IdNivel');
        $this->setPrimaryKey('IdNivel');
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
            ->integer('IdNivel')
            ->allowEmptyString('IdNivel', 'create');

        $validator
            ->scalar('Descripcion')
            ->maxLength('Descripcion', 100)
            ->requirePresence('Descripcion', 'create')
            ->allowEmptyString('Descripcion', false);

        $validator
            ->integer('cantPregNivel')
            ->requirePresence('cantPregNivel', 'create')
            ->allowEmptyString('cantPregNivel', false);

        return $validator;
    }
}
