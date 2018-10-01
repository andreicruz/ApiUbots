<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Filmes Controller
 *
 * @property \App\Model\Table\FilmesTable $Filmes
 *
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $filmes = $this->paginate($this->Filmes);

        $this->set([
            'filmes' => $filmes,
            '_serialize' => ['filmes']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filme = $this->Filmes->get($id, [
            'contain' => []
        ]);
        $this->set([
            'filme' => $filme,
            '_serialize' => ['filme']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filme = $this->Filmes->newEntity($this->request->getData());
        if ($this->Filmes->save($filme)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'filme' => $filme,
            '_serialize' => ['message', 'filme']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = '';
        $filme = $this->Filmes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filme = $this->Filmes->patchEntity($filme, $this->request->getData());
            if ($this->Filmes->save($filme)) {
                $this->Flash->success(__('The filme has been saved.'));

                $message = 'Saved';
                
            }else{
                $this->Flash->error(__('The filme could not be saved. Please, try again.'));
                $message = 'Error';
            }
        }
        $this->set(compact('filme'));
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filme id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $filme = $this->Filmes->get($id);
        $message = 'Deleted';
        if (!$this->Filmes->delete($filme)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
