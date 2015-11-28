<section class="login-page fadeInDown-animation">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-form">
                    <div class="login-title">
                        <span class="icon"><i class="fa fa-group"></i></span>
                        <span class="text"><?= __('Reminder') ?></span>
                    </div>
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create(null, array('class' => 'validate', 'id' => 'login-form')) ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input">
                                    <?= $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'username-input required email', 'data-rule-required' => 'true', 'data-rule-email' => 'true', 'type' => 'email')) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input clearfix">
                                    <input type="submit" id="login_submit" class="submit-input grad-btn ln-tr" value="<?= __('Submit') ?>">
                                </div>
                            </div>
                            <div class="col-md-12 clearfix">
                                <div class="forgot fr">
                                    <a href="<?= $this->Url->build('/login') ?>" class="new-user"><i class="fa fa-arrow-left"></i> <?= __('Back to Login') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>