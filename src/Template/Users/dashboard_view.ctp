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
            <li><?= $this->Html->link(__('Edit {0}', [__('User')]), ['action' => 'edit', $user->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Delete {0}', [__('User')]), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
            <li><?= $this->Html->link(__('List {0}', [__('Users')]), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New {0}', [__('User')]), ['action' => 'add']) ?> </li>
            </ul>
    </div>
</div>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('View {0}', [__('User')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('View {0}', [__('User')]), ['action' => 'view']); ?>
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
              </div>
                            </div>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>