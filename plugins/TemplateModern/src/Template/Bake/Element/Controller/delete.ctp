
    /**
     * Delete method
     *
     * @param string|null $id <%= $singularHumanName %> id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $<%= $singularName %> = $this-><%= $currentModelName %>->get($id);
        if ($this-><%= $currentModelName; %>->delete($<%= $singularName %>)) {
            $this->Flash->success(__('The {0} has been deleted.', [__('<%= $singularHumanName %>')]));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', [__('<%= $singularHumanName %>')]));
        }
        return $this->redirect(['action' => 'index']);
    }
