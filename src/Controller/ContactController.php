<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Email\Email;

/**
 * Contact Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 */
class ContactController extends AppController
{
    public $helpers = [
        'Siezi/SimpleCaptcha.SimpleCaptcha',
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function index()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $validator = new \Siezi\SimpleCaptcha\Model\Validation\SimpleCaptchaValidator();
            $errors = $validator->errors($this->request->data);
            if($errors) {
                $this->Flash->error(__('Error').': '.$errors['captcha']['captcha']);
            } else {

                $email = new Email('default');
                $email->template('contact', 'default')
                    ->to(Configure::read('App.email'))
                    ->from($this->request->data['email'], $this->request->data['name'])
                    ->subject($this->request->data['subject'])
                    ->viewVars(['name' => $this->request->data['name'],
                                'email' => $this->request->data['email'],
                                'phone' => $this->request->data['phone'],
                                'subject' => $this->request->data['subject'],
                                'message' => $this->request->data['message']])
                    ->send();
                $this->Flash->success(__('Message sent successfully!'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }
}