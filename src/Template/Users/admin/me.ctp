<div class="page-header">
    <div class="pull-sm-left">
        <h1><?= __('Profile') ?></h1>
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
            <?= $this->Html->link(__('Profile'), ['action' => 'me']); ?>
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
                            echo $this->Form->input('name');
                            echo $this->Form->input('birth', ['label' => __('Birth'), 'class' => 'date', 'type' => 'text']);
                            echo $this->Form->input('email', ['class' => 'email']);
                            echo $this->Form->input('image', ['label' => 'Foto', 'type' => 'file']);
                        ?>
                    </fieldset>
                </div>
                <br>
                <div class="box-content">
                    <div class="form-divider"><?= __('Senha') ?></div>
                    <fieldset class="fieldset-bordered">
                        <?php
                            echo $this->Form->input('new_password', ['label' => __('New password'), 'help' => __('Para alterar sua senha, digite a nova senha; caso contrário, deixe este espaço em branco.'), 'type' => 'password', 'class' => 'password', 'autocomplete' => 'off']);
                            echo $this->Form->input('confirm_new_password', ['label' => __('Repeat new password'), 'help' => __('Digite sua nova senha novamente. '), 'type' => 'password', 'class' => 'compare', 'rel' => 'new-password']);
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