<?php
$this->layout = 'Templates/admin/logon';
?>
<div class="login-body-content col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4">
    <div class="row">
        <h2><?= __('Remind Password') ?></h2>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null, array('class' => 'validate', 'id' => 'login-form')) ?>
            <div class="form-group">
                <div class="email controls">
                    <?= $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'form-control required', 'data-rule-required' => 'true', 'data-rule-email' => 'true')) ?>
                </div>
            </div>
            <div class="submit">
                <input type="submit" class="btn btn-primary" value="<?= __('Submit') ?>">
            </div>
        </form>
        <div class="forget">
            <a href="<?= $this->Url->build('/login') ?>">
                <span><?= __('Back to login') ?></span>
            </a>
        </div>
    </div>
</div>