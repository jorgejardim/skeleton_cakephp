<section class="main-page">
    <div class="container">
        <div class="page-title pull-md-left">
            <h3><?= __('List {0}', [__('Users')]) ?></h3>
        </div>
        <div class="page-actions pull-md-right">
            <div class="page-actions-dropdown">
                <select class="dropdown dropdown-actions">
                    <option value="" class="label"><?= __('Actions'); ?></option>
                    <option value="<?= $this->Url->build(['action' => 'add']) ?>"><?= __('New'); ?></option>
                </select>
            </div>
        </div>
        <div class="visible-xs-block visible-sm-block"><br /></div>
        <div class="clearfix"></div>
        <div class="entry">
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
                            <td class="actions" nowrap="nowrap">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-dark-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-red btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <div class="pagination fl">
                    <?= $this->Paginator->numbers(['class' => "clearfix", 'prev' => true, 'next' => true]) ?>
                </div>
                <div class="fr pagination-count">
                    <p><?= $this->Paginator->counter(); ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>