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
            <li>
                <?= $this->Form->postLink(__('Delete'),
                                          ['action' => 'delete', $user->id],
                                          ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
                                         ) ?>
            </li>
            <li><?= $this->Html->link(__('View {0}', [__('User')]), ['action' => 'view', $user->id]) ?></li>
            <li><?= $this->Html->link(__('New {0}', [__('User')]), ['action' => 'add']); ?></li>
            <li><?= $this->Html->link(__('List {0}', [__('Users')]), ['action' => 'index']) ?></li>
        </ul>
    </div>
</div>
<div id="main">
    <div class="container-fluid">
        <div class="page-header">
            <div class="pull-left">
                <h1><?= __('Edit {0}', [__('User')]) ?></h1>
            </div>
        </div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('Edit {0}', [__('User')]), ['action' => 'add']); ?>
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
                            <?= $this->Form->create($user, ['align' => [
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
                                        echo $this->Form->input('email');
                                        echo $this->Form->input('username');
                                        echo $this->Form->input('password');
                                        echo $this->Form->input('oauth_provider');
                                        echo $this->Form->input('oauth_uid');
                                        echo $this->Form->input('locale');
                                        echo $this->Form->input('role');
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