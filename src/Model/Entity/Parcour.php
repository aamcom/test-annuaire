<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parcour Entity
 *
 * @property int $id
 * @property int $personne_id
 * @property int $societe_id
 * @property \Cake\I18n\Time $date_entree
 * @property \Cake\I18n\Time $date_sortie
 *
 * @property \App\Model\Entity\Personne $personne
 * @property \App\Model\Entity\Societe $societe
 */
class Parcour extends Entity
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
        '*' => true,
        'id' => false
    ];
}
