<?php
use Migrations\AbstractMigration;

class AddidJuegoToGenerales extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('generales');
        $table->addColumn('id_juego', 'int', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
