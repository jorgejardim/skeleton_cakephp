<div class="page-header">
    <div class="pull-sm-left">
        <h1><?= __('Users') ?></h1>
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
                    <li><a href="<?= $this->Url->build(['action' => 'add', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('Add {0}', [__('User')]); ?></a></li>
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
            <?= $this->Html->link(__('List {0}', [__('Users')]), ['action' => 'index']); ?>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-content">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'table-filter pull-right']); ?>
                    <div class="dib">
                        <?php echo $this->Form->input('search', ['placeholder' => __('Search'), 'value' => @$this->request->query['search'], 'div' => false, 'label' => false]); ?>
                    </div>
                <?= $this->Form->end() ?>
                <div class="clearfix"></div>
                <div class="table-responsive">
                    <table class="table table-hover table-nomargin table-striped table-bordered">
                        <?php if($users->count()) { ?>
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('role_id', __('Role Id')); ?></th>
                                    <th><?= $this->Paginator->sort('name', __('Name')); ?></th>
                                    <th><?= $this->Paginator->sort('email', __('Email')); ?></th>
                                    <th class="actions"><?= __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?>
                                        </td>
                                        <td><?= h($user->name) ?></td>
                                        <td><?= h($user->email) ?></td>
                                        <td class="actions" nowrap="nowrap">
                                            <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $user->id, '?' => @$this->request->query], ['title' => __('View'), 'class' => 'btn btn-dark-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                            <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $user->id, '?' => @$this->request->query], ['title' => __('Edit'), 'class' => 'btn btn-dark-blue btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                            <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $user->id, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?'), 'title' => __('Delete'), 'class' => 'btn btn-red btn-listing btn-small', 'escape' => false, 'data-toggle'=>'tooltip', 'data-placement'=>'top']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php } else { ?>
                            <tbody>
                                <tr>
                                    <td class="text-center nopadding">
                                        <div class="alert alert-warning m-b-0"><?= __('No results found') ?></div>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <?php if($this->Paginator->param('count') > 1) { ?>
                    <div class="paginator">
                        <div class="pull-left">
                            <ul class="pagination">
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers(['after' => '', 'before' => '']) ?>
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