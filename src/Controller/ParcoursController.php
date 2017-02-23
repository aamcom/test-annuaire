<?php
namespace App\Controller;

/**
 * Parcours Controller
 *
 * @property \App\Model\Table\ParcoursTable $Parcours
 */
class ParcoursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnes', 'Societes']
        ];
        $parcours = $this->paginate($this->Parcours);

        $this->set(compact('parcours'));
        $this->set('_serialize', ['parcours']);
    }

    /**
     * View method
     *
     * @param string|null $id Parcour id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parcour = $this->Parcours->get($id, [
            'contain' => ['Personnes', 'Societes']
        ]);

        $this->set('parcour', $parcour);
        $this->set('_serialize', ['parcour']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parcour = $this->Parcours->newEntity();
        if ($this->request->is('post')) {
            $parcour = $this->Parcours->patchEntity($parcour, $this->request->data);
            if ($this->Parcours->save($parcour)) {
                $this->Flash->success(__('The parcour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parcour could not be saved. Please, try again.'));
        }
        $personnes = $this->Parcours->Personnes->find('list', ['limit' => 200]);
        $societes = $this->Parcours->Societes->find('list', ['limit' => 200]);
        $this->set(compact('parcour', 'personnes', 'societes'));
        $this->set('_serialize', ['parcour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parcour id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parcour = $this->Parcours->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parcour = $this->Parcours->patchEntity($parcour, $this->request->data);
            if ($this->Parcours->save($parcour)) {
                $this->Flash->success(__('The parcour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parcour could not be saved. Please, try again.'));
        }
        $personnes = $this->Parcours->Personnes->find('list', ['limit' => 200]);
        $societes = $this->Parcours->Societes->find('list', ['limit' => 200]);
        $this->set(compact('parcour', 'personnes', 'societes'));
        $this->set('_serialize', ['parcour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parcour id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parcour = $this->Parcours->get($id);
        if ($this->Parcours->delete($parcour)) {
            $this->Flash->success(__('The parcour has been deleted.'));
        } else {
            $this->Flash->error(__('The parcour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
