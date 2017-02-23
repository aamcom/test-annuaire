<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NiveauEtudes Model
 *
 * @property \Cake\ORM\Association\HasMany $Personnes
 *
 * @method \App\Model\Entity\NiveauEtude get($primaryKey, $options = [])
 * @method \App\Model\Entity\NiveauEtude newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NiveauEtude[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NiveauEtude|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NiveauEtude patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NiveauEtude[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NiveauEtude findOrCreate($search, callable $callback = null, $options = [])
 */
class NiveauEtudesTable extends Table
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

        $this->table('niveau_etudes');
        $this->displayField('libelle');
        $this->primaryKey('id');

        $this->hasMany('Personnes', [
            'foreignKey' => 'niveau_etude_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('libelle', 'create')
            ->notEmpty('libelle');

        return $validator;
    }
}
