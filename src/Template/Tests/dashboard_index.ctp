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
            <li><?= $this->Html->link(__('New {0}', [__('Test')]), ['action' => 'add']); ?></li>
        </ul>
    </div>
</div>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('List {0}', [__('Tests')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('List {0}', [__('Tests')]), ['action' => 'index']); ?>
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
                                        <th><?= $this->Paginator->sort('slug', __('Slug')); ?></th>
                                        <th><?= $this->Paginator->sort('date', __('Date')); ?></th>
                                        <th><?= $this->Paginator->sort('calendar', __('Calendar')); ?></th>
                                        <th><?= $this->Paginator->sort('hour', __('Hour')); ?></th>
                                        <th><?= $this->Paginator->sort('status', __('Status')); ?></th>
                                        <th class="actions"><?= __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tests as $test): ?>
                                        <tr>
                                            <td><?= $this->Number->format($test->id) ?></td>
                                            <td><?= h($test->name) ?></td>
                                            <td><?= h($test->slug) ?></td>
                                            <td><?= h($test->date) ?></td>
                                            <td><?= h($test->calendar) ?></td>
                                            <td><?= h($test->hour) ?></td>
                                            <td><?= h($test->status) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['action' => 'view', $test->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $test->id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if($this->Paginator->param('count') > 1) { ?>
                                <div class="paginator">
                                    <div class="pull-left">
                                        <ul class="pagination">
                                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next(__('next') . ' >') ?>
                                        </ul>
                                    </div>
                                    <div class="pull-right pagination-count">
                                        <p><?= $this->Paginator->param('current').' '.__('of').' '.$this->Paginator->param('count') ?></p>
                                    </div>
                                    <div class="cleaxrfix"></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>