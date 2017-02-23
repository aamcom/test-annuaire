<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Societes Model
 *
 * @property \Cake\ORM\Association\HasMany $Parcours
 *
 * @method \App\Model\Entity\Societe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Societe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Societe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Societe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Societe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Societe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Societe findOrCreate($search, callable $callback = null, $options = [])
 */
class SocietesTable extends Table
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

        $this->table('societes');
        $this->displayField('nom');
        $this->primaryKey('id');

        $this->hasMany('Parcours', [
            'foreignKey' => 'societe_id'
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
            ->requirePresence('siret', 'create')
            ->notEmpty('siret');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        return $validator;
    }
}
