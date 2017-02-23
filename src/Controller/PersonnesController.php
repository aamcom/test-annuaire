<?php
namespace App\Controller;

/**
 * Personnes Controller
 *
 * @property \App\Model\Table\PersonnesTable $Personnes
 */
class PersonnesController extends AppController
{
    public function index()
    {
/*        $this->viewBuilder()->setLayout("layout-test");*/
        $this->paginate = [
            'contain' => ['NiveauEtudes']
        ];
        $personnes = $this->paginate($this->Personnes);

        $this->set(compact('personnes'));
        $this->set('_serialize', ['personnes']);
    }

    public function view($id = null)
    {
        $personne = $this->Personnes->get($id, [
            'contain' => ['NiveauEtudes', 'Parcours']
        ]);
        $this->set('personne', $personne);
        $this->set('_serialize', ['personne']);
    }

    public function add()
    {
        $personne = $this->Personnes->newEntity();
        if ($this->request->is('post')) {
            $personne = $this->Personnes->patchEntity($personne, $this->request->data);
            if ($this->Personnes->save($personne)) {
                $this->Flash->success(__('The personne has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personne could not be saved. Please, try again.'));
        }
        $niveauEtudes = $this->Personnes->NiveauEtudes->find('list', ['limit' => 200]);
        $this->set(compact('personne', 'niveauEtudes'));
        $this->set('_serialize', ['personne']);
    }

    public function edit($id = null)
    {
        $personne = $this->Personnes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personne = $this->Personnes->patchEntity($personne, $this->request->data);
            if ($this->Personnes->save($personne)) {
                $this->Flash->success(__('The personne has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personne could not be saved. Please, try again.'));
        }
        $niveauEtudes = $this->Personnes->NiveauEtudes->find('list', ['limit' => 200]);
        $this->set(compact('personne', 'niveauEtudes'));
        $this->set('_serialize', ['personne']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personne = $this->Personnes->get($id);
        if ($this->Personnes->delete($personne)) {
            $this->Flash->success(__('The personne has been deleted.'));
        } else {
            $this->Flash->error(__('The personne could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function jsonify()
    {
        $personne = $this->Personnes->find('all', [
            'contain' => ['NiveauEtudes', 'Parcours']]);
        $data = json_encode($personne, JSON_PRETTY_PRINT);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    public function jsonid($id = null)
    {
        $personne = $this->Personnes->get($id, [
            'contain' => ['NiveauEtudes', 'Parcours']
        ]);
        $data = json_encode($personne, JSON_PRETTY_PRINT);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }
}
