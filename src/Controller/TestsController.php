<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 */
class TestsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    /**
     * Blank Page
     */
    public function blank() {}

    /**
     * PDF
     */
    public function pdf() {
        $this->set('pdf', new \fpdf\FPDF('P','mm','A4'));
        $this->render('pdf', 'pdf');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('tests', $this->paginate($this->Tests));
        $this->set('_serialize', ['tests']);
    }

    /**
     * View method
     *
     * @param string|null $id Test id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => []
        ]);
        $this->set('test', $test);
        $this->set('_serialize', ['test']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $test = $this->Tests->newEntity();
        if ($this->request->is('post')) {
            $test = $this->Tests->patchEntity($test, $this->request->data);
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The {0} has been saved.', [__('Test')]));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', [__('Test')]));
            }
        }
        $this->set(compact('test'));
        $this->set('_serialize', ['test']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $test = $this->Tests->patchEntity($test, $this->request->data);
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The {0} has been saved.', [__('Test')]));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', [__('Test')]));
            }
        }
        $this->set(compact('test'));
        $this->set('_serialize', ['test']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $test = $this->Tests->get($id);
        if ($this->Tests->delete($test)) {
            $this->Flash->success(__('The {0} has been deleted.', [__('Test')]));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', [__('Test')]));
        }
        return $this->redirect(['action' => 'index']);
    }
}