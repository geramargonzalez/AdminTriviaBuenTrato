<?php
use Migrations\AbstractSeed;
use Cake\i18n\Time;
use Cake\Auth\DefaultPasswordHasher;
use App\Enums\RolesEnum;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->table('roles');
        foreach (RolesEnum::GetList() as $key => $value) {
            $roles->insert([
                'name' => $value,
                'description' => $value
            ]);
        }
        $roles->save();

        $user = [
            'name' => 'Gerardo',
            'username' => 'Geranajestic',
            'email' => 'admin@admin.com',
            'password' => (new DefaultPasswordHasher)->hash('1234'),
            'role_id' => RolesEnum::ADMINISTRATOR
        ];
      
        $users = $this->table('users');
        $users->insert($user)->save();
    }
}
