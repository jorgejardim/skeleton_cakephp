<div class="page-header">
    <div class="pull-sm-left">
        <h1><?= __('Blank Page') ?></h1>
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
                    <li><a href="<?= $this->Url->build(['action' => 'blank', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('Add New {0}', [__('Action')]); ?></a></li>
                    <li><a href="<?= $this->Url->build(['action' => 'blank', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('Action'); ?></a></li>
                    <li><a href="<?= $this->Url->build(['action' => 'blank', '?' => @$this->request->query]) ?>" class="btn-page-action"><i class="fa fa-plus-circle"></i> <?= __('Action'); ?></a></li>
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
            <?= $this->Html->link(__('List {0}', [__('Tests')]), ['action' => 'index', '?' => @$this->request->query]); ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Blank Page'), ['action' => 'blank', '?' => @$this->request->query]); ?>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-content">
                <?= $this->Flash->render('auth') ?>
                <?= __('Hello World!') ?>
            </div>
        </div>
    </div>
</div>