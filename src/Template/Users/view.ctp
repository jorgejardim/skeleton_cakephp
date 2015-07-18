<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('View {0}', [__('User')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'edit', $user->id]) ?>"><?= __('Edit'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'delete', $user->id]) ?>" confirm="<?= __('Are you sure you want to delete?'); ?>"><?= __('Delete'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'index']) ?>"><?= __('List'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
                        <?= $this->Flash->render() ?>
                        <h2><?= h($user->name) ?></h2>
                        <div class="row">
                            <div class="col-lg-5">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                                      <h6><?= __('Name') ?></h6>
                  <p><?= h($user->name) ?></p>
                                                                      <h6><?= __('Email') ?></h6>
                  <p><?= h($user->email) ?></p>
                                                                      <h6><?= __('Username') ?></h6>
                  <p><?= h($user->username) ?></p>
                                                                      <h6><?= __('Password') ?></h6>
                  <p><?= h($user->password) ?></p>
                                                                      <h6><?= __('Oauth Provider') ?></h6>
                  <p><?= h($user->oauth_provider) ?></p>
                                                                      <h6><?= __('Oauth Uid') ?></h6>
                  <p><?= h($user->oauth_uid) ?></p>
                                                                      <h6><?= __('Locale') ?></h6>
                  <p><?= h($user->locale) ?></p>
                                                                      <h6><?= __('Role') ?></h6>
                  <p><?= h($user->role) ?></p>
                                                        </div>
                    </div>
              </div>
                                              <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Id') ?></h6>
                            <p><?= $this->Number->format($user->id) ?></p>
                                                </div>
                    </div>
              </div>
                                                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Created') ?></h6>
                            <p><?= h($user->created) ?></p>
                                            <h6><?= __('Modified') ?></h6>
                            <p><?= h($user->modified) ?></p>
                                                </div>
                    </div>
              </div>
                                                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Status') ?></h6>
                            <p><?= $user->status ? __('Yes') : __('No'); ?></p>
                                                </div>
                    </div>
              </div><div class="clearfix"></div>
                            </div>
                                                                                    </div>
    </div>
</section>