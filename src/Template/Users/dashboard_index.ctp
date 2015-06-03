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
            <li><?= $this->Html->link(__('New {0}', [__('User')]), ['action' => 'add']); ?></li>
        </ul>
    </div>
</div>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('List {0}', [__('Users')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('List {0}', [__('Users')]), ['action' => 'index']); ?>
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
                        <div class="row">
                            <table class="table table-hover table-nomargin table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id', __('Id')); ?></th>
                                        <th><?= $this->Paginator->sort('name', __('Name')); ?></th>
                                        <th><?= $this->Paginator->sort('email', __('Email')); ?></th>
                                        <th><?= $this->Paginator->sort('username', __('Username')); ?></th>
                                        <th><?= $this->Paginator->sort('password', __('Password')); ?></th>
                                        <th><?= $this->Paginator->sort('oauth_provider', __('Oauth Provider')); ?></th>
                                        <th><?= $this->Paginator->sort('oauth_uid', __('Oauth Uid')); ?></th>
                                        <th class="actions"><?= __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $this->Number->format($user->id) ?></td>
                                            <td><?= h($user->name) ?></td>
                                            <td><?= h($user->email) ?></td>
                                            <td><?= h($user->username) ?></td>
                                            <td><?= h($user->password) ?></td>
                                            <td><?= h($user->oauth_provider) ?></td>
                                            <td><?= h($user->oauth_uid) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if($this->Paginator->param('pageCount') > 1) { ?>
                                <div class="paginator">
                                    <div class="pull-left">
                                        <ul class="pagination">
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next(__('next') . ' >') ?>
                                        </ul>
                                    </div>
                                    <div class="pull-right pagination-count">
                                        <p><?= __('Page').' '.$this->Paginator->param('page').' '.__('of').' '.$this->Paginator->param('pageCount') ?></p>
                                    </div>
                                    <div class="cleaxrfix"></div>
                                </div>
                            <?php } ?>

                            <?php //debug($this->Paginator->params()) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

