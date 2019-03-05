<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PreguntaFixture
 *
 */
class PreguntaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pregunta';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idPregunta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'txtPregunta' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'descripcion' => ['type' => 'string', 'length' => 1000, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'IdNivel' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cantRespuestas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'ForeignKey_Nivel' => ['type' => 'index', 'columns' => ['IdNivel'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idPregunta'], 'length' => []],
            'ForeignKey_Nivel' => ['type' => 'foreign', 'columns' => ['IdNivel'], 'references' => ['Nivel', 'IdNivel'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'idPregunta' => 30,
                'txtPregunta' => 'Quien es Miles Morales?',
                'descripcion' => 'La pregunta 30',
                'IdNivel' => 1,
                'user_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 2,
                'status' => 1
            ],
             [
                'idPregunta' => 31,
                'txtPregunta' => 'Quien es Clark Kent?',
                'descripcion' => 'La pregunta 31',
                'IdNivel' => 1,
                'user_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 3,
                'status' => 1
            ],
             [
                'idPregunta' => 32,
                'txtPregunta' => 'Quien es Pato lucas',
                'descripcion' => 'La pregunta 32',
                'IdNivel' => 1,
                'user_id' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 3,
                'status' => 1
            ],
        ];
        parent::init();
    }
}
