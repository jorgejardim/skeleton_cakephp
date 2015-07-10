<?php $this->sidebar = 'nav-show'; //nav-hidden ?>
<div id="left">
    <div class="subnav">
        <div class="subnav-title">
            <a href="#" class='toggle-subnav'>
                <i class="fa fa-angle-down"></i>
                <span><?= __('Actions'); ?></span>
            </a>
        </div>
        <ul class="subnav-menu">
            <li><?= $this->Html->link(__('Edit {0}', [__('Test')]), ['action' => 'edit', $test->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete {0}', [__('Test')]), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id)]) ?> </li>
            <li><?= $this->Html->link(__('List {0}', [__('Tests')]), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New {0}', [__('Test')]), ['action' => 'add']) ?> </li>
            </ul>
    </div>
</div>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('View {0}', [__('Test')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('View {0}', [__('Test')]), ['action' => 'view']); ?>
                </li>
            </ul>
            <div class="close-bread">
                <a href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <h2><?= h($test->name) ?></h2>
                        <div class="row">
                            <div class="col-lg-5">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                                      <h6><?= __('Name') ?></h6>
                  <p><?= h($test->name) ?></p>
                                                                      <h6><?= __('Slug') ?></h6>
                  <p><?= h($test->slug) ?></p>
                                                        </div>
                    </div>
              </div>
                                              <div class="col-lg-2">
                  <div class="panel panel-default">
                      <div class="panel-body">
                                            <h6><?= __('Id') ?></h6>
                            <p><?= $this->Number->format($test->id) ?></p>
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
    </div>
</div>