<?php
namespace App\Model\Table;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parcours Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personnes
 * @property \Cake\ORM\Association\BelongsTo $Societes
 *
 * @method \App\Model\Entity\Parcour get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parcour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parcour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parcour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parcour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parcour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parcour findOrCreate($search, callable $callback = null, $options = [])
 */
class ParcoursTable extends Table
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

        $this->table('parcours');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Personnes', [
            'foreignKey' => 'personne_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Societes', [
            'foreignKey' => 'societe_id',
            'joinType' => 'INNER'
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
            ->date('date_entree')
            ->requirePresence('date_entree', 'create')
            ->notEmpty('date_entree');

        $validator
            ->date('date_sortie')
            ->allowEmpty('date_sortie');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['personne_id'], 'Personnes'));
        $rules->add($rules->existsIn(['societe_id'], 'Societes'));

        return $rules;
    }
}
