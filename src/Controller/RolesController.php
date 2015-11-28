<?php
namespace App\Controller;

use App\Controller\AppController;
use ReflectionClass;
use ReflectionMethod;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class RolesController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        if(!empty($this->request->query['search'])) {
            $this->paginate['conditions'] = ['Roles.'.$this->Roles->displayField().' LIKE' => '%'.$this->request->query['search'].'%'];
        }
        $this->paginate['order'] = ['Roles.'.$this->Roles->displayField() => 'ASC'];
        $this->set('roles', $this->paginate($this->Roles));
        $this->set('_serialize', ['roles']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['role'] = $this->request->data['name'];
            $this->request->data['permissions'] = null;
            if(!empty($this->request->data['resources'])) {
                $this->request->data['permissions'] = json_encode($this->request->data['resources']);
            }
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Saved successfully'));
                return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
            } else {
                $this->Flash->error(__('Error: It not saved. Please, try again.').$this->Common->getEntityErrors($role));
            }
        }
        $resources = $this->_getResources();
        $this->set(compact('role', 'resources'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['role'] = $this->request->data['name'];
            $this->request->data['permissions'] = null;
            if(!empty($this->request->data['resources'])) {
                $this->request->data['permissions'] = json_encode($this->request->data['resources']);
            }
            $role = $this->Roles->patchEntity($role, $this->request->data);
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Saved successfully'));
                return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
            } else {
                $this->Flash->error(__('Error: It not saved. Please, try again.').$this->Common->getEntityErrors($role));
            }
        }
        $resources = $this->_getResources();
        $this->set(compact('role', 'resources'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exist = $this->Roles->Users->findByRoleId($id)->first();
        if(!$exist) {
            $role = $this->Roles->get($id);
            if ($this->Roles->delete($role)) {
                $this->Flash->success(__('Deleted successfully'));
            } else {
                $this->Flash->error(__('Error: It not deleted. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Error: It can not be deleted, as there are registered users with this profile.'));
        }
        return $this->redirect(['action' => 'index', '?' => @$this->request->query]);
    }

    /**
     * Get All Controllers
     *
     * @return array Controllers.
     */
    private function _getControllers()
    {
        $files = scandir(APP.'Controller/');
        $results = [];
        $ignoreList = [
            '.',
            '..',
            'Component',
            'AppController.php',
            'PagesController.php',
            'TestsController.php',
            'ToolsController.php',
        ];
        foreach($files as $file){
            if(!in_array($file, $ignoreList)) {
                $controller = explode('.', $file)[0];
                array_push($results, str_replace('Controller', '', $controller));
            }
        }
        return $results;
    }

    /**
     * Get All Resources
     *
     * @return array Resources.
     */
    private function _getResources()
    {
        $controllers = $this->_getControllers();
        $resources = [];
        foreach($controllers as $controllerName){
            $className = 'App\\Controller\\'.$controllerName.'Controller';
            $class = new ReflectionClass($className);
            $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
            $ignoreList = [
                'beforeFilter',
                'afterFilter',
                'initialize',
                'login',
                'logout',
                'reminder',
                'activation',
                'register',
                'me'
            ];
            $name = __($controllerName);
            foreach($actions as $action){
                if($action->class == $className && !in_array($action->name, $ignoreList) && $action->name!='_listing'){
                    $resources[$name][$controllerName.'/'.$action->name] = __($action->name);
                }
            }
            asort($resources[$name]);
        }
        asort($resources);
        return $resources;
    }
}