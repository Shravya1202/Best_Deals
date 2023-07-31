<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CategoriesTable;


/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $categoriesTable = new CategoriesTable();
        $categories = $categoriesTable->find('all')
            ->toArray();

        $this->set('categories', $categories);
    }

    public function getCoupons()
    {
        $this->loadModel('Deals');
        $this->loadModel('Coupons');

        if ($this->request->is('ajax')) {
            $categoryId = $this->request->getData('category_id');

            $coupons = $this->Coupons->find('all')
                ->contain(['Deals', 'Deals.Stores'])
                ->where(['Deals.category_id' => $categoryId])
                ->toArray();

            $this->set(compact('coupons'));
            $this->viewBuilder()->setOption('serialize', ['coupons']);
        }
    }

    public function getCashbacks()
    {
        $this->loadModel('Deals');
        $this->loadModel('Cashbacks');

        if ($this->request->is('ajax')) {
            $categoryId = $this->request->getData('category_id');

            $cashbacks = $this->Cashbacks->find('all')
                ->contain(['Deals', 'Deals.Stores'])
                ->where(['Deals.category_id' => $categoryId])
                ->toArray();

            $this->set(compact('cashbacks'));
            $this->viewBuilder()->setOption('serialize', ['cashbacks']);
        }
    }

    public function view($category_id = null)
    {
        $category = $this->Categories->get($category_id, [
            'contain' => [],
        ]);

        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}