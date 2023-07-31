<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cashbacks Controller
 *
 * @property \App\Model\Table\CashbacksTable $Cashbacks
 * @method \App\Model\Entity\Cashback[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CashbacksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Cashbacks');
        $cashbacks = $this->Cashbacks->find('all')->contain(['Deals.Stores']);

        // Pass the cashback details to the view
        $this->set(compact('cashbacks'));
    }

    public function cashback()
    {
        $this->loadModel('Deals');
        $this->loadModel('Stores');

        if ($this->request->is('ajax')) {
            $dealId = $this->request->getData('deal_id');

            $cashbacks = $this->Cashbacks->find('all')
                ->contain(['Deals', 'Deals.Stores'])
                ->where(['Cashbacks.deal_id' => $dealId])
                ->toArray();

            $this->set(compact('cashbacks'));
            $this->viewBuilder()->setOption('serialize', ['cashbacks']);
        }
    }

    public function cashbackinfo()
    {
        $this->loadModel('Deals');
        $this->loadModel('Stores');

        if ($this->request->is('ajax')) {
            $dealId = $this->request->getData('deal_id');

            $cashbacks = $this->Cashbacks->find('all')
                ->contain(['Deals', 'Deals.Stores'])
                ->where(['Cashbacks.deal_id' => $dealId])
                ->toArray();

            $this->set(compact('cashbacks'));
            $this->viewBuilder()->setOption('serialize', ['cashbacks']);
        }
    }

    public function view($cashback_id = null)
    {
        $cashbacks = $this->Cashbacks->get($cashback_id, [
            'contain' => ['Deals', 'Deals.Stores'],
        ]);

        $this->set(compact('cashbacks'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cashback = $this->Cashbacks->newEmptyEntity();
        if ($this->request->is('post')) {
            $cashback = $this->Cashbacks->patchEntity($cashback, $this->request->getData());
            if ($this->Cashbacks->save($cashback)) {
                $this->Flash->success(__('The cashback has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cashback could not be saved. Please, try again.'));
        }
        $deals = $this->Cashbacks->Deals->find('list', ['limit' => 200])->all();
        $this->set(compact('cashback', 'deals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cashback id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cashback = $this->Cashbacks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashback = $this->Cashbacks->patchEntity($cashback, $this->request->getData());
            if ($this->Cashbacks->save($cashback)) {
                $this->Flash->success(__('The cashback has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cashback could not be saved. Please, try again.'));
        }
        $deals = $this->Cashbacks->Deals->find('list', ['limit' => 200])->all();
        $this->set(compact('cashback', 'deals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cashback id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cashback = $this->Cashbacks->get($id);
        if ($this->Cashbacks->delete($cashback)) {
            $this->Flash->success(__('The cashback has been deleted.'));
        } else {
            $this->Flash->error(__('The cashback could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}