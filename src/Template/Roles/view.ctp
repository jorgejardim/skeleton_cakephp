        <div class="page-header">
            <div class="pull-sm-left">
                <h1><?= __('Roles') ?> <span>- <?= __('View') ?></span></h1>
            </div>
            <div class="page-actions pull-sm-right">
                <nav role="navigation" class="navbar navbar-default navbar-page-actions">
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapseActionsPage" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbarCollapseActionsPage" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= $this->Url->build(['action' => 'edit', $role->id, '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-edit"></i> <?= __('Edit'); ?></a></li>
                            <li><?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ' . __('Delete'), ['action' => 'delete', $role->id, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?', $role->role), 'escape' => false, 'class' => 'btn-page-action btn-page-action-delete']) ?></li>
                            <li><a href="<?= $this->Url->build(['action' => 'index', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-list"></i> <?= __('List'); ?></a></li>
                            <li><a href="<?= $this->Url->build(['action' => 'add', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('New'); ?></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="visible-xs-block visible-sm-block"><br /></div>
            <div class="clearfix"></div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('List {0}', [__('Roles')]), ['action' => 'index', '?' => @$this->request->query]); ?>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $role->id, '?' => @$this->request->query]); ?>
                </li>
            </ul>
        </div>
        <div class="row page-view">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <h2 class="m-t-0"><?= h($role->name) ?></h2>
                        <div class="row">
                            <div class="col-lg-5">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                                      <h6><?= __('Role') ?></h6>
                  <p><?= h($role->role) ?></p>
                                                                      <h6><?= __('Name') ?></h6>
                  <p><?= h($role->name) ?></p>
                                                        </div>
                    </div>
              </div>
                                                                          </div>
                                                                            <div class="row texts">
                                    <div class="col-lg-9">
                                        <h6><?= __('Permissions') ?></h6>
                                        <?= $this->Text->autoParagraph(h($role->permissions)); ?>
                                    </div>
                                </div>
                                                                            
                    </div>
                </div>
            </div>
        </div>