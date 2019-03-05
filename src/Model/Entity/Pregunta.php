<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Preguntum Entity
 *
 * @property int $idPregunta
 * @property string $txtPregunta
 * @property string $descripcion
 * @property int $IdNivel
 * @property string $user_id
 * @property string $image
 * @property int $cantRespuestas
 *
 * @property \App\Model\Entity\User $user
 */
class Pregunta extends Entity
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
        'txtPregunta' => true,
        'descripcion' => true,
        'IdNivel' => true,
        'user_id' => true,
        'image' => true,
        'cantRespuestas' => true,
        'user' => true,
        'status' => true
    ];
}
