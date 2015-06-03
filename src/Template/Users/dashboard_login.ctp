<?php echo $this->Facebook->initJsSDK(); ?>
<?php $this->layout = 'dashboard_login' ?>
<h2><?= __('SIGN IN') ?></h2>
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create(null, array('class' => 'form-validate', 'id' => 'form-sing-in')) ?>
    <div class="form-group">
        <div class="email controls">
            <?= $this->Form->input('username', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'form-control required email', 'data-rule-required' => 'true', 'data-rule-email' => 'true', 'type' => 'email')) ?>
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
    <hr>
    <div class="push or text-center"><?= __('or Login with') ?></div>
    <div class="row social push">
        <div class="col-xs-6">
            <?php echo $this->Facebook->loginButton($options = []); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $this->Facebook->loginButton($options = []); ?>
        </div>
    </div>
</form>
<div class="forget">
    <a href="<?= $this->Url->build('/reminder') ?>">
        <span><?= __('Forgot password?') ?></span>
    </a>
</div>
<div class="create-an-account push text-center">
    <?= __('Don\'t have an Account yet?') ?>
    <a href="<?= $this->Url->build('/register') ?>">
        <span><?= __('Create Account') ?>!</span>
    </a>
</div>