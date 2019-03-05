<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Generale Entity
 *
 * @property int $id
 * @property string $puntosPorPregunta
 * @property string $fallo
 * @property string $puntosTotales
 * @property string $time
 * @property string $cantPreguntas
 * @property bool $status
 * @property string $id_juego
 */
class Generale extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'puntosPorPregunta' => true,
        'fallo' => true,
        'puntosTotales' => true,
        'time' => true,
        'cantPreguntas' => true,
        'status' => true,
       
    ];
}
