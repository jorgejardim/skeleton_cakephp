<section class="login-page fadeInDown-animation">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-form">
                    <div class="login-title">
                        <span class="icon"><i class="fa fa-group"></i></span>
                        <span class="text"><?= __('Login Area') ?></span>
                    </div>
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create(null, array('class' => 'validate', 'id' => 'login-form')) ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input">
                                    <?= $this->Form->input('username', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'username-input required email', 'data-rule-required' => 'true', 'data-rule-email' => 'true', 'type' => 'email')) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input">
                                    <?= $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => __('Password'), 'class' => 'password-input required', 'data-rule-required' => 'true')) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input clearfix">
                                    <input type="submit" id="login_submit" class="submit-input grad-btn ln-tr" value="Login">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 clearfix">
                                <div class="custom-checkbox fl">
                                    <input type="checkbox" name="remember" class='checkbox-input' data-skin="square" data-color="blue" id="login_remember">
                                    <label for="login_remember"><?= __('Remember me') ?></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 clearfix">
                                <div class="forgot fr">
                                    <a href="<?= $this->Url->build('/register') ?>" class="new-user"><?= __('Create New Account') ?></a> /
                                    <a href="<?= $this->Url->build('/reminder') ?>" class="reset"><?= __('Forgot password?') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-options">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <a href="<?echo // $this->Facebook->getLoginUrl(); ?>" class="login-op-btn grad-btn ln-tr fb"><?= __('Login with Facebook Account') ?></a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="#" class="login-op-btn grad-btn ln-tr gp"><?= __('Login with Google Account') ?></a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="#" class="login-op-btn grad-btn ln-tr tw"><?= __('Login with Twitter Account') ?></a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a href="#" class="login-op-btn grad-btn ln-tr ya"><?= __('Login with Yahoo Account') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>