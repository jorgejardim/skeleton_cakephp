<?php $this->layout  = 'dashboard'; ?>
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
                    <li><?= $this->Html->link(__('List {0}', [__('Tests')]), ['action' => 'index']) ?></li>
        </ul>
    </div>
</div>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('Add {0}', [__('Test')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('Add {0}', [__('Test')]), ['action' => 'add']); ?>
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
                            <?= $this->Form->create($test, ['align' => [
                                                                        'sm' => [
                                                                            'left' => 2,
                                                                            'middle' => 10,
                                                                            'right' => 12
                                                                        ],
                                                                        'md' => [
                                                                            'left' => 2,
                                                                            'middle' => 6,
                                                                            'right' => 4
                                                                        ]
                                                                      ]]); ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->input('name');
                                        //echo $this->Form->input('slug');
                                        echo $this->Form->input('text');
                                        echo $this->Form->input('date', ['type'=>'text']);
                                        echo $this->Form->input('calendar', ['type'=>'text']);
                                        echo $this->Form->input('hour', ['type'=>'text']);
                                        //echo $this->Form->input('locale', ['options'=>['pt_BR'=>'pt_BR','en_US'=>'en_US']]);
                                        echo $this->Form->input('status');
                                    ?>
                                </fieldset>
                                <br />
                                <div class="col-sm-12 col-md-8 text-right">
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>