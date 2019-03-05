<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use App\Enums\RolesEnum;


/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property |\Cake\ORM\Association\HasMany $Pregunta
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pregunta', [
            'foreignKey' => 'user_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', true);

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status', 'create');

        return $validator;
      }

      /**
       * Returns a rules checker object that will be used for validating
       * application integrity.
       *
       * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
       * @return \Cake\ORM\RulesChecker
       */
      public function buildRules(RulesChecker $rules)
      { 
          $rules->add($rules->isUnique(['email']));
          $rules->add($rules->existsIn(['role_id'], 'Roles'));
          return $rules;
      }
      public function getUser(\Cake\Datasource\EntityInterface $profile) {
        if (empty($profile->email)) {
            throw new \RuntimeException('Could not find email in social profile.');
        }
        $user = $this->find()
            ->where(['email' => $profile->email])
            ->first();
        if ($user) {
            return $user;
        }
        $new_pass = substr(md5(time()), 0, 8);
        $user = $this->newEntity(['email' => $profile->email,
                                  'name' =>  $profile->first_name,
                                  'username' => $profile->first_name,
                                  'image' => $profile->picture_url,
                                  'password' => $new_pass,
                                  'role_id' => RolesEnum::User
                                ]);
        $user = $this->save($user);
        if (!$user) {
            throw new \RuntimeException('Unable to save new user');
        }
        return $user;
    }


}
