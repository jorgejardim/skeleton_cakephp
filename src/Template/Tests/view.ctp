        <div class="page-header">
            <div class="pull-sm-left">
                <h1><?= __('Tests') ?> <span>- <?= __('View') ?></span></h1>
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
                            <li><a href="<?= $this->Url->build(['action' => 'edit', $test->id, '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-edit"></i> <?= __('Edit'); ?></a></li>
                            <li><?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ' . __('Delete'), ['action' => 'delete', $test->id, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-page-action btn-page-action-delete']) ?></li>
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
                    <?= $this->Html->link(__('List {0}', [__('Tests')]), ['action' => 'index']); ?>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $test->id]); ?>
                </li>
            </ul>
        </div>
        <div class="row page-view">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <h2 class="m-t-0"><?= h($test->name) ?></h2>
                        <div class="row">
                            <div class="col-lg-5">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                                      <h6><?= __('Name') ?></h6>
                  <p><?= h($test->name) ?></p>
                                                                      <h6><?= __('Slug') ?></h6>
                  <p><?= h($test->slug) ?></p>
                                                                      <h6><?= __('Locale') ?></h6>
                  <p><?= h($test->locale) ?></p>
                                                        </div>
                    </div>
              </div>
                                              <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Id') ?></h6>
                            <p><?= $this->Number->format($test->id) ?></p>
                                            <h6><?= __('Currency') ?></h6>
                            <p><?= $this->Number->format($test->currency) ?></p>
                                            <h6><?= __('Numeral') ?></h6>
                            <p><?= $this->Number->format($test->numeral) ?></p>
                                                </div>
                    </div>
              </div>
                                                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Date') ?></h6>
                            <p><?= h($test->date) ?></p>
                                            <h6><?= __('Calendar') ?></h6>
                            <p><?= h($test->calendar) ?></p>
                                            <h6><?= __('Hour') ?></h6>
                            <p><?= h($test->hour) ?></p>
                                            <h6><?= __('Created') ?></h6>
                            <p><?= h($test->created) ?></p>
                                            <h6><?= __('Modified') ?></h6>
                            <p><?= h($test->modified) ?></p>
                                                </div>
                    </div>
              </div>
                                                <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Status') ?></h6>
                            <p><?= $test->status ? __('Yes') : __('No'); ?></p>
                                                </div>
                    </div>
              </div>
                            </div>
                                                                            <div class="row texts">
                                    <div class="col-lg-9">
                                        <h6><?= __('Text') ?></h6>
                                        <?= $this->Text->autoParagraph(h($test->text)); ?>
                                    </div>
                                </div>
                                                                            
                    </div>
                </div>
            </div>
        </div>