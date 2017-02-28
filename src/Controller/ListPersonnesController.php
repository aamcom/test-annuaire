<?php
namespace App\Controller;

/**
 * ListPersonnes Controller
 *
 * @property \App\Model\Table\PersonnesTable $Personnes
 */



class ListPersonnesController extends AppController
{
    public function index()
    {
        $this->loadModel('Personnes');
        $personne = $this->Personnes->find('all', [
            'contain' => ['NiveauEtudes', 'Parcours']]);
        $data = json_encode($personne, JSON_PRETTY_PRINT);
        echo $data;
        die();
    }

}