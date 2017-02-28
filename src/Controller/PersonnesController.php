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
        $this->paginate = [
            'contain' => ['NiveauEtudes']
        ];
        $personnes = $this->paginate($this->Personnes);

        $this->set(compact('personnes'));
        $this->set('_serialize', ['personnes']);
    }

    public function getcoordinates($address) {
        $goodaddress = str_replace(' ','+',$address);
        $json = json_decode(file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$goodaddress.'&sensor=false'));
        $data['lat'] = $json->results[0]->geometry->location->lat;
        $data['long'] = $json->results[0]->geometry->location->lng;
        return $data;
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
            $address = $personne->adresse.'+'.$personne->cp.'+'.$personne->ville;
            $coordinates = $this->getcoordinates($address);
            $personne->latitude = $coordinates['lat'];
            $personne->longitude = $coordinates['long'];
            $uid = uniqid();

            // IMAGES UPLOAD
            $extension = strtolower(pathinfo($this->request->data['avatar']['name'], PATHINFO_EXTENSION));
            if (!empty($this->request->data['avatar']['tmp_name']) && in_array($extension, array('jpg', 'jpeg', 'png')))
            {
                move_uploaded_file(
                    $this->request->data['avatar']['tmp_name'], WWW_ROOT . DS . '/img/avatars' . DS . $uid . '.' . $extension
                );
                $personne->avatar = $uid . '.' . $extension;
            }
            // IMAGES UPLOAD ^

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
}
