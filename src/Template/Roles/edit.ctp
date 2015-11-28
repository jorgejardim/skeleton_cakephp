<div class="page-header">
    <div class="pull-sm-left">
        <h1><?= __('Roles') ?> <span>- <?= __('Edit') ?></span></h1>
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
                    <li><?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ' . __('Delete'), ['action' => 'delete', $role->id, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-page-action btn-page-action-delete']) ?></li>
                    <li><a href="<?= $this->Url->build(['action' => 'add', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('New'); ?></a></li>
                    <li><a href="<?= $this->Url->build(['action' => 'index', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-list"></i> <?= __('List'); ?></a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="breadcrumbs">
    <ul>
        <li>
            <a href="<?= $this->Url->build('/') ?>"><?= __('Home') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('List {0}', [__('Roles')]), ['action' => 'index', '?' => @$this->request->query]); ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id, '?' => @$this->request->query]); ?>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-content">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($role, [
                    'class' => 'form-horizontal form-striped validate',
                    'align' => ['sm' => ['left' => 2, 'middle' => 10, 'right' => 12], 'md' => ['left' => 2, 'middle' => 10, 'right' => 12]]]); ?>
                    <fieldset class="fieldset-bordered">
                        <?php echo $this->Form->input('name', ['label' => __('Role')]); ?>
                        <div class="form-group">
                            <label for="permissions" class="control-label col-sm-2 col-md-2"><?= __('Permissions') ?></label>
                            <div class="col-sm-10 col-md-10">
                                <?php $permissions = @json_decode($role->permissions) ?>
                                <?php foreach ($resources as $controllerName => $controllerMethods): ?>
                                    <div class="resources-line">
                                        <div class="controller-name w150 pull-left p-t-4"><?= $controllerName ?></div>
                                        <div class="btn-group controller-methods" data-toggle="buttons">
                                            <?php foreach ($controllerMethods as $key => $controllerMethod): ?>
                                                <label class="btn btn-primary <?= @in_array($key, $permissions)?'active':'' ?>">
                                                    <input type="checkbox" autocomplete="off" value="<?= $key ?>" name="resources[]" <?= @in_array($key, $permissions)?'checked="checked"':'' ?>> <?= $controllerMethod ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </fieldset>
                    <br />
                    <div class="col-sm-12 text-center">
                        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary btn-large']) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>