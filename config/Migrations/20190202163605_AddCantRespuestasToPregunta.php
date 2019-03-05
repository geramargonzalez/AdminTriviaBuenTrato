<?php
use Migrations\AbstractMigration;

class AddCantRespuestasToPregunta extends AbstractMigration
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
        $table = $this->table('pregunta');
        $table->addColumn('cantRespuestas', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
