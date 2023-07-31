<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Deals Controller
 *
 * @property \App\Model\Table\DealsTable $Deals
 * @method \App\Model\Entity\Deal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DealsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Stores'],
        ];
        $deals = $this->paginate($this->Deals);

        $this->set(compact('deals'));
    }

    /**
     * View method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($deal_id = null)
    {
        $deal = $this->Deals->get($deal_id, [
            'contain' => ['Categories', 'Stores', 'Coupons'],
        ]);

        $this->set(compact('deal'));
    }

    public function ccode($deal_id = null)
    {

        $deal = $this->Deals->get($deal_id, [
            'contain' => ['Categories', 'Stores', 'Coupons'],
        ]);

        $this->set(compact('deal'));
    }

    public function cashback($deal_id=null)
    {
        $deal = $this->Deals->get($deal_id, [
            'contain' => ['Categories', 'Stores', 'Coupons'],
        ]);

        $this->set(compact('deal'));
    }

    
    public function add()
    {
        $deal = $this->Deals->newEmptyEntity();
        if ($this->request->is('post')) {
            $deal = $this->Deals->patchEntity($deal, $this->request->getData());
            if ($this->Deals->save($deal)) {
                $this->Flash->success(__('The deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deal could not be saved. Please, try again.'));
        }
        $categories = $this->Deals->Categories->find('list', ['limit' => 200])->all();
        $stores = $this->Deals->Stores->find('list', ['limit' => 200])->all();
        $this->set(compact('deal', 'categories', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deal = $this->Deals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deal = $this->Deals->patchEntity($deal, $this->request->getData());
            if ($this->Deals->save($deal)) {
                $this->Flash->success(__('The deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deal could not be saved. Please, try again.'));
        }
        $categories = $this->Deals->Categories->find('list', ['limit' => 200])->all();
        $stores = $this->Deals->Stores->find('list', ['limit' => 200])->all();
        $this->set(compact('deal', 'categories', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deal = $this->Deals->get($id);
        if ($this->Deals->delete($deal)) {
            $this->Flash->success(__('The deal has been deleted.'));
        } else {
            $this->Flash->error(__('The deal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}