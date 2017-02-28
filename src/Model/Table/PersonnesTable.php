<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personnes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NiveauEtudes
 * @property \Cake\ORM\Association\HasMany $Parcours
 *
 * @method \App\Model\Entity\Personne get($primaryKey, $options = [])
 * @method \App\Model\Entity\Personne newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Personne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personne|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Personne[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personne findOrCreate($search, callable $callback = null, $options = [])
 */
class PersonnesTable extends Table
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

        $this->table('personnes');
        $this->displayField('nom');
        $this->primaryKey('id');

        $this->belongsTo('NiveauEtudes', [
            'foreignKey' => 'niveau_etude_id'
        ]);
        $this->hasMany('Parcours', [
            'foreignKey' => 'personne_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('civilite')
            ->requirePresence('civilite', 'create')
            ->notEmpty('civilite');

        $validator
            ->requirePresence('nom', 'create')
            ->notEmpty('nom')
            ->add('nom', 'validFormat',[
                'rule' => array('custom', '/^[a-zA-Z]+$/'),
                'message' => 'Please enter a valid name.'
            ]);

        $validator
            ->requirePresence('prenom', 'create')
            ->notEmpty('prenom')
            ->add('prenom', 'validFormat',[
                'rule' => array('custom', '/^[a-zA-Z]+$/'),
                'message' => 'Please enter a valid name.'
            ]);

        $validator
            ->date('date_naissance')
            ->requirePresence('date_naissance', 'create')
            ->notEmpty('date_naissance');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse')
            ->add('adresse', 'validFormat',[
                'rule' => array('custom', '/^[a-zA-Z0-9 ]*$/'),
                'message' => 'Please enter a valid address.']);

        $validator
            ->integer('cp')
            ->requirePresence('cp', 'create')
            ->notEmpty('cp')
            ->add('cp', 'maxlength',  ['rule'  =>  ['maxLength', 5]]);

        $validator
            ->requirePresence('ville', 'create')
            ->notEmpty('ville')
            ->add('ville', 'validFormat',[
                'rule' => array('custom', '/^[a-zA-Z]+$/'),
                'message' => 'Please enter a valid city name.'
            ]);

        $validator
            ->requirePresence('avatar', 'create')
            ->notEmpty('avatar');

        $validator
            ->boolean('permis')
            ->requirePresence('permis', 'create')
            ->notEmpty('permis');

        $validator
            ->numeric('longitude')
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

        $validator
            ->numeric('latitude')
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['niveau_etude_id'], 'NiveauEtudes'));

        return $rules;
    }

    public function findTagged(Query $query, array $options) {
        return $this->find()
            ->distinct(['Personnes.id'])
            ->matching('Tags', function($q) use ($options) {
           return $q->where(['Tags.title IN' => $options['tags']]);
        });
    }
}
