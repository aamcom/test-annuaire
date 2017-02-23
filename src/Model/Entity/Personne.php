<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Personne Entity
 *
 * @property int $id
 * @property string $email
 * @property int $civilite
 * @property string $nom
 * @property string $prenom
 * @property \Cake\I18n\Time $date_naissance
 * @property string $adresse
 * @property int $cp
 * @property string $ville
 * @property string $photo
 * @property bool $permis
 * @property int $niveau_etude_id
 * @property float $longitude
 * @property float $latitude
 *
 * @property \App\Model\Entity\NiveauEtude $niveau_etude
 * @property \App\Model\Entity\Parcour[] $parcours
 */
class Personne extends Entity
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
