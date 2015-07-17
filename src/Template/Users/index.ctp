<div class="b-titlebar">
    <div class="container layout">
        <ul class="crumbs">
            <li><?= __('You are here:') ?></li>
            <li><a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a></li>
            <li><?= $this->Html->link(__('List {0}', [__('Users')]), ['action' => 'index']); ?></li>
        </ul>
        <h1><?= __('List {0}', [__('Users')]) ?></h1>
    </div>
</div>
<div class="content shortcodes">
    <div class="container layout">
        <div class="row">
            <div class="row-item col-md-2 sidebar">
                <h3 style="margin-bottom: 20px;"><?= __('Actions'); ?></h3>
                <div>
                    <ul class="pl15">
                        <li><?= $this->Html->link(__('New {0}', [__('User')]), ['action' => 'add']); ?></li>
                    </ul>
                </div>
            </div>
            <div class="row-item col-md-10">
                <?= $this->Flash->render() ?>
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