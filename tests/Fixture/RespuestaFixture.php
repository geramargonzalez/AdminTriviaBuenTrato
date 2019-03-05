<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RespuestaFixture
 *
 */
class RespuestaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'respuesta';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idRespuesta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'txtRespuesta' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'correcta' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'IdPregunta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ForeignKey_Preg' => ['type' => 'index', 'columns' => ['IdPregunta'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idRespuesta'], 'length' => []],
            'ForeignKey_Preg' => ['type' => 'foreign', 'columns' => ['IdPregunta'], 'references' => ['Pregunta', 'idPregunta'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'idRespuesta' => 1,
                'txtRespuesta' => 'Lorem ipsum dolor sit amet',
                'correcta' => 1,
                'IdPregunta' => 1
            ],
        ];
        parent::init();
    }
}
