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
    public $helpers = [
        'Siezi/SimpleCaptcha.SimpleCaptcha',
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    /**
     * Mult Tests
     * Sempre pode apagar e fazer novos testes
     */
    public function tests()
    {

    }

    /**
     * Blank Page
     */
    public function blank() {}

    /**
     * PDF
     * Na URL incluir a extensão .pdf
     * ex: http://www.dominio.com/tests/pdf.pdf
     */
    public function pdf() {}

    /**
     * Test Captcha
     */
    public function captcha($id = 1)
    {
        $test = $this->Tests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $validator = new \Siezi\SimpleCaptcha\Model\Validation\SimpleCaptchaValidator();
            $errors = $validator->errors($this->request->data);
            if($errors) {
                $this->Flash->error(__('Error').': '.$errors['captcha']['captcha']);
            } else {

                $test = $this->Tests->patchEntity($test, $this->request->data);
                if ($this->Tests->save($test)) {
                    $this->Flash->success(__('Saved successfully'));
                    return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
                } else {
                    $this->Flash->error(__('Error: It not saved. Please, try again.').$this->Common->getEntityErrors($test));
                }

            }
        }
        $this->set(compact('test'));
        $this->set('_serialize', ['test']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        if(!empty($this->request->query['search'])) {
            $this->paginate['conditions'] = ['Tests.'.$this->Tests->displayField().' LIKE' => '%'.$this->request->query['search'].'%'];
        }
        $this->paginate['order'] = ['Tests.'.$this->Tests->displayField() => 'ASC'];
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
                $this->Flash->success(__('Saved successfully'));
                return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
            } else {
                $this->Flash->error(__('Error: It not saved. Please, try again.').$this->Common->getEntityErrors($test));
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
                $this->Flash->success(__('Saved successfully'));
                return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
            } else {
                $this->Flash->error(__('Error: It not saved. Please, try again.').$this->Common->getEntityErrors($test));
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
            $this->Flash->success(__('Deleted successfully'));
        } else {
            $this->Flash->error(__('Error: It not deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
    }
}