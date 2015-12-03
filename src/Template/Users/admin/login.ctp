<?php
$this->layout = 'Templates/admin/logon';
?>
<div class="login-body-content col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4">
    <div class="row">
        <h2><?= __('SIGN IN') ?></h2>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create(null, array('class' => 'validate', 'id' => 'login-form')) ?>
            <div class="form-group">
                <div class="email controls">
                    <?= $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'form-control required email', 'data-rule-required' => 'true', 'data-rule-email' => 'true', 'type' => 'email')) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="pw controls">
                    <?= $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => __('Password'), 'class' => 'form-control required', 'data-rule-required' => 'true')) ?>
                </div>
            </div>
            <div class="submit">
                <div class="remember">
                    <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember">
                    <label for="remember"><?= __('Remember me') ?></label>
                </div>
                <input type="submit" class="btn btn-primary" value="<?= __('Sign me in') ?>">
            </div>
        </form>
        <div class="forget">
            <a href="<?= $this->Url->build('/reminder') ?>">
                <span><?= __('Forgot password?') ?></span>
            </a>
        </div>
        <div class="forget">
            <a href="<?= $this->Url->build('/register') ?>">
                <span><?= __('Create Account') ?></span>
            </a>
        </div>
        <div class="login-options">
            <a href="<?= $fb_url_login ?>" class="facebook"><i class="fa fa-facebook-square"></i> <span><?= __('Login with {0} Account', 'Facebook') ?></span></a>
        </div>
    </div>
</div>