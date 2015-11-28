<?php
    use Cake\Core\Configure;
    // echo $this->Facebook->initJsSDK();
?>
<section class="login-page fadeInDown-animation">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-form">
                    <div class="login-title">
                        <span class="icon"><i class="fa fa-group"></i></span>
                        <span class="text"><?= __('Create Account') ?></span>
                    </div>
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create(null, array('class' => 'validate', 'id' => 'login-form')) ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="input">
                                    <?= $this->Form->input('name', array('div' => false, 'label' => false, 'placeholder' => __('Name'), 'class' => 'username-input required', 'data-rule-required' => 'true')) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input">
                                    <?= $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'email-input required', 'data-rule-required' => 'true', 'data-rule-email' => 'true')) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input">
                                    <?= $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => __('Password'), 'class' => 'password-input required', 'data-rule-required' => 'true')) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input">
                                    <?= $this->Form->input('verify_password', array('div' => false, 'label' => false, 'placeholder' => __('Verify Password'), 'class' => 'confirm-password-input compare required', 'data-rule-required' => 'true', 'rel' => 'password', 'type' => 'password')) ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input clearfix">
                                    <input type="submit" id="reg_submit" class="submit-input grad-btn ln-tr" value="<?= __('Register') ?>">
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 clearfix">
                                <div class="custom-checkbox fl">
                                    <i class="fa fa-thumbs-up"></i>
                                    <?= __('By signing up, you confirm that you accept our') ?>
                                    <a data-toggle="modal" data-target="#modal-terms"><?= __('Terms of Service and Privacy Policy.') ?></a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 clearfix">
                                <div class="forgot fr">
                                    <a href="<?= $this->Url->build('/login') ?>" class="new-user"><i class="fa fa-arrow-left"></i> <?= __('Back to Login') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if(Configure::read('Template.social_login')) { ?>
                    <div class="login-options">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <a href="#" class="login-op-btn grad-btn ln-tr fb"><?= __('Register with Facebook Account') ?></a>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="#" class="login-op-btn grad-btn ln-tr gp"><?= __('Register with Google Account') ?></a>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="#" class="login-op-btn grad-btn ln-tr tw"><?= __('Register with Twitter Account') ?></a>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <a href="#" class="login-op-btn grad-btn ln-tr ya"><?= __('Register with Yahoo Account') ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade" id="modal-terms">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h3 class="modal-title text-center"><strong><?= __('Terms of Service and Privacy Policy.') ?></strong></h3>
            </div>
            <div class="modal-body">
                <h4 class="page-header">1. <strong>General</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                <h4 class="page-header">2. <strong>Account</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                <h4 class="page-header">3. <strong>Service</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                <h4 class="page-header">4. <strong>Payments</strong></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button data-dismiss="modal" class="btn btn-effect-ripple btn-sm btn-primary" type="button" style="overflow: hidden; position: relative;"><?= __('I\'ve read them!') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>