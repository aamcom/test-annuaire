<?php
namespace App\Controller;

/**
 * Societes Controller
 *
 * @property \App\Model\Table\SocietesTable $Societes
 */
class SocietesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $societes = $this->paginate($this->Societes);

        $this->set(compact('societes'));
        $this->set('_serialize', ['societes']);
    }

    /**
     * View method
     *
     * @param string|null $id Societe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $societe = $this->Societes->get($id, [
            'contain' => ['Parcours']
        ]);

        $this->set('societe', $societe);
        $this->set('_serialize', ['societe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $societe = $this->Societes->newEntity();
        if ($this->request->is('post')) {
            $societe = $this->Societes->patchEntity($societe, $this->request->data);
            if ($this->Societes->save($societe)) {
                $this->Flash->success(__('The societe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The societe could not be saved. Please, try again.'));
        }
        $this->set(compact('societe'));
        $this->set('_serialize', ['societe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Societe id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $societe = $this->Societes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $societe = $this->Societes->patchEntity($societe, $this->request->data);
            if ($this->Societes->save($societe)) {
                $this->Flash->success(__('The societe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The societe could not be saved. Please, try again.'));
        }
        $this->set(compact('societe'));
        $this->set('_serialize', ['societe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Societe id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $societe = $this->Societes->get($id);
        if ($this->Societes->delete($societe)) {
            $this->Flash->success(__('The societe has been deleted.'));
        } else {
            $this->Flash->error(__('The societe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
