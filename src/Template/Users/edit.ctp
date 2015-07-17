<div class="b-titlebar">
    <div class="container layout">
        <ul class="crumbs">
            <li><?= __('You are here:') ?></li>
            <li><a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a></li>
            <li><?= $this->Html->link(__('Edit {0}', [__('User')]), ['action' => 'add']); ?></li>
        </ul>
        <h1><?= __('Edit {0}', [__('User')]) ?></h1>
    </div>
</div>
<div class="content shortcodes">
    <div class="container layout">
        <div class="row">
            <div class="row-item col-md-2 sidebar">
                <h3 style="margin-bottom: 20px;"><?= __('Actions'); ?></h3>
                <div>
                    <ul class="pl15">
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
            <div class="row-item col-md-10">
                <?= $this->Flash->render() ?>









                        <div>
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
                                    ?>
                                </fieldset>
                                <br />
                                <div class="col-sm-12 col-md-8 text-right">
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn-submit btn colored']) ?>
                                </div>
                            <?= $this->Form->end() ?>
                        </div>










                <?php if($this->Paginator->param('count') > 1) { ?>
                    <div class="pagination">
                        <div>
                            <?= __('Page').' '.$this->Paginator->param('current').' '.__('of').' '.$this->Paginator->param('count') ?>
                        </div>
                        <?= $this->Paginator->prev('&laquo;', ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('&raquo;', ['escape' => false]) ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>