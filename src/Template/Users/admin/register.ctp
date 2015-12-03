<?php
$this->layout = 'Templates/admin/logon';
?>
<div class="login-body-content col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3">
    <div class="row">
        <h2><?= __('Create Account') ?></h2>
        <?= $this->Flash->render() ?>

        <?php if (empty($check_mail)): ?>

            <?= $this->Form->create(null, array('class' => 'validate', 'id' => 'login-form')) ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="email controls">
                                <?= $this->Form->input('name', array('div' => false, 'label' => false, 'placeholder' => __('Name'), 'class' => 'form-control required', 'data-rule-required' => 'true')) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="email controls">
                                <?= $this->Form->input('email', array('div' => false, 'label' => false, 'placeholder' => __('Email'), 'class' => 'form-control required email', 'data-rule-required' => 'true', 'data-rule-email' => 'true', 'type' => 'email')) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="pw controls">
                                <?= $this->Form->input('password', array('div' => false, 'label' => false, 'placeholder' => __('Password'), 'class' => 'form-control required password', 'data-rule-required' => 'true', 'autocomplete' => 'off')) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="pw controls">
                                <?= $this->Form->input('verify_password', array('div' => false, 'label' => false, 'placeholder' => __('Repeat password'), 'class' => 'form-control compare required password', 'data-rule-required' => 'true', 'rel' => 'password', 'type' => 'password', 'autocomplete' => 'off')) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" class="btn btn-primary" value="<?= __('To sign up') ?>">
                </div>
            </form>
            <div class="login-options">
                <a href="<?= $fb_url_login ?>" class="facebook"><i class="fa fa-facebook-square"></i> <span><?= __('Register with {0} Account', 'Facebook') ?></span></a>
            </div>


        <?php endif ?>
    </div>
</div>
<div class="clearfix"></div>
<div class="register-terms col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3">
    <i class="fa fa-thumbs-up"></i>
    <?= __('By signing up, you confirm that you accept our') ?>
    <a data-toggle="modal" data-target="#modal-terms"><?= __('Terms of Service and Privacy Policy.') ?></a>
</div>
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