<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Petugas Controller
 *
 * @property \App\Model\Table\PetugasTable $Petugas
 */
class PetugasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Petugas->find();
        $petugas = $this->paginate($query);

        $this->set(compact('petugas'));
    }

    /**
     * View method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $petuga = $this->Petugas->get($id, contain: []);
        $this->set(compact('petuga'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $petuga = $this->Petugas->newEmptyEntity();
        if ($this->request->is('post')) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The petuga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petuga could not be saved. Please, try again.'));
        }
        $this->set(compact('petuga'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $petuga = $this->Petugas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The petuga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petuga could not be saved. Please, try again.'));
        }
        $this->set(compact('petuga'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $petuga = $this->Petugas->get($id);
        if ($this->Petugas->delete($petuga)) {
            $this->Flash->success(__('The petuga has been deleted.'));
        } else {
            $this->Flash->error(__('The petuga could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login']);
    $this->Authentication->addUnauthenticatedActions(['login', 'register']);
}

public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'petugas',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}
public function logout()
{
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'petugas', 'action' => 'login']);
    }
}
public function register()
    {
        $petuga = $this->Petugas->newEmptyEntity();
        if ($this->request->is('post')) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The petuga has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The petuga could not be saved. Please, try again.'));
        }
        $this->set(compact('petuga'));
    }
}
