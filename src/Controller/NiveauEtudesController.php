<?php
namespace App\Controller;

/**
 * NiveauEtudes Controller
 *
 * @property \App\Model\Table\NiveauEtudesTable $NiveauEtudes
 */
class NiveauEtudesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $niveauEtudes = $this->paginate($this->NiveauEtudes);

        $this->set(compact('niveauEtudes'));
        $this->set('_serialize', ['niveauEtudes']);
    }

    /**
     * View method
     *
     * @param string|null $id Niveau Etude id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $niveauEtude = $this->NiveauEtudes->get($id, [
            'contain' => ['Personnes']
        ]);

        $this->set('niveauEtude', $niveauEtude);
        $this->set('_serialize', ['niveauEtude']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $niveauEtude = $this->NiveauEtudes->newEntity();
        if ($this->request->is('post')) {
            $niveauEtude = $this->NiveauEtudes->patchEntity($niveauEtude, $this->request->data);
            if ($this->NiveauEtudes->save($niveauEtude)) {
                $this->Flash->success(__('The niveau etude has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The niveau etude could not be saved. Please, try again.'));
        }
        $this->set(compact('niveauEtude'));
        $this->set('_serialize', ['niveauEtude']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Niveau Etude id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $niveauEtude = $this->NiveauEtudes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $niveauEtude = $this->NiveauEtudes->patchEntity($niveauEtude, $this->request->data);
            if ($this->NiveauEtudes->save($niveauEtude)) {
                $this->Flash->success(__('The niveau etude has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The niveau etude could not be saved. Please, try again.'));
        }
        $this->set(compact('niveauEtude'));
        $this->set('_serialize', ['niveauEtude']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Niveau Etude id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $niveauEtude = $this->NiveauEtudes->get($id);
        if ($this->NiveauEtudes->delete($niveauEtude)) {
            $this->Flash->success(__('The niveau etude has been deleted.'));
        } else {
            $this->Flash->error(__('The niveau etude could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
