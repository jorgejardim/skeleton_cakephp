        <div class="page-header">
            <div class="pull-sm-left">
                <h1><?= __('Users') ?> <span>- <?= __('Add') ?></span></h1>
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
                    <?= $this->Html->link(__('List {0}', [__('Users')]), ['action' => 'index']); ?>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <?= $this->Html->link(__('Add'), ['action' => 'add', $user->id]); ?>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <?= $this->Form->create($user, [
                        'class' => 'form-horizontal form-striped validate', 'type' => 'file',
                        'align' => ['sm' => ['left' => 2, 'middle' => 10, 'right' => 12], 'md' => ['left' => 2, 'middle' => 10, 'right' => 12]]]); ?>
                        <div class="box-content">
                            <?= $this->Flash->render() ?>
                            <div class="form-divider"><?= __('Basic information') ?></div>
                            <fieldset class="fieldset-bordered">
                                <?php
                                    echo $this->Form->input('role_id', ['label' => __('Role Id'), 'options' => $roles]);
                                    echo $this->Form->input('name', ['label' => __('Name')]);
                                    echo $this->Form->input('email', ['label' => __('Email'), 'class' => 'email']);
                                    echo $this->Form->input('birth', ['label' => __('Birth'), 'class' => 'date', 'type' => 'text']);
                                    echo $this->Form->input('image', ['label' => 'Foto', 'type' => 'file']);
                                    echo $this->Form->input('status', ['label' => __('Status'), 'options' => [1 => __('Active'), 0 => __('Blocked')]]);
                                ?>
                            </fieldset>
                        </div>
                        <br>
                        <div class="box-content">
                            <div class="form-divider"><?= __('Senha') ?></div>
                            <fieldset class="fieldset-bordered">
                                <?php
                                    echo $this->Form->input('password', ['label' => __('Password'), 'type' => 'password', 'class' => 'password', 'autocomplete' => 'off']);
                                    echo $this->Form->input('confirm_password', ['label' => __('Repeat password'), 'help' => __('Enter the password again.'), 'type' => 'password', 'class' => 'compare password', 'rel' => 'password', 'autocomplete' => 'off']);
                                ?>
                            </fieldset>
                            <br />
                            <div class="col-sm-12 text-center">
                                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary btn-large']) ?>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>