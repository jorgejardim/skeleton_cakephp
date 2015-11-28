        <div class="page-header">
            <div class="pull-sm-left">
                <h1><?= __('Tests') ?> <span>- <?= __('Edit') ?></span></h1>
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
                            <li><?= $this->Form->postLink('<i class="fa fa-trash-o"></i> ' . __('Delete'), ['action' => 'delete', $test->id, '?' => @$this->request->query], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-page-action btn-page-action-delete']) ?></li>
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
                    <?= $this->Html->link(__('List {0}', [__('Tests')]), ['action' => 'index']); ?>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $test->id]); ?>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-content">
                        <?= $this->Flash->render() ?>
                        <?= $this->Form->create($test, [
                            'class' => 'form-horizontal form-striped validate',
                            'align' => ['sm' => ['left' => 2, 'middle' => 10, 'right' => 12], 'md' => ['left' => 2, 'middle' => 10, 'right' => 12]]]); ?>
                            <fieldset class="fieldset-bordered">
                                <?php
                                    echo $this->Form->input('name', ['label' => __('Name')]);
                                    echo $this->Form->input('slug', ['label' => __('Slug')]);
                                    echo $this->Form->input('text', ['label' => __('Text')]);
                                    echo $this->Form->input('locale', ['label' => __('Locale')]);
                                    echo $this->Form->input('date', ['label' => __('Date'), 'class' => 'dateBR', 'type' => 'text']);
                                    echo $this->Form->input('calendar', ['label' => __('Calendar'), 'class' => 'datetimeBR', 'type' => 'text']);
                                    echo $this->Form->input('hour', ['label' => __('Hour'), 'class' => 'time', 'type' => 'text']);
                                    echo $this->Form->input('currency', ['label' => __('Currency'), 'class' => 'currency', 'type' => 'text']);
                                    echo $this->Form->input('numeral', ['label' => __('Numeric'), 'class' => 'numeric', 'type' => 'text']);
                                    echo $this->Form->input('status', ['label' => __('Status')]);
                                ?>
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